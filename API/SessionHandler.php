<?php
namespace Nev;

class SessionHandler {
	private $cookieName;
	private $pdoDB;
	private $auth;
	private $loggedIn;

	function __construct(&$pdoDB, $cname, $sha1){
		$this->pdoDB = $pdoDB;
		$this->cookieName = $cname;
		$this->sha1key = $sha1;
	}
	
	public function isActive(){
		return $_COOKIE[$this->cookieName] ?? false;
	}
	
	public function unsetCk(){
		if(isset($_COOKIE[$this->cookieName])){
			unset($_COOKIE[$this->cookieName]);
		}
	}
	
	public function verifyHash($hash){
		if(!$hash) return false;
		$q = $this->pdoDB->prepare("SELECT * FROM `sessions` WHERE `hash` = :hash AND `expiration` > NOW() LIMIT 1");
        $q->execute(['hash' => $hash]);
		if($q->rowCount() == 1){
			return true;
		}
		return false;
	}
	
	public function isSessionValid(){
		return $this->verifyHash($this->isActive());
	}

    public function myHash(){
        if($this->isActive()) return false;
		$q = $this->pdoDB->prepare("SELECT `userhash` FROM `sessions` WHERE `hash` = :hash LIMIT 1");
        $q->execute(['hash' => $this->isActive()]);
		if($q->rowCount() == 1){
			return $q->fetch(\PDO::FETCH_OBJ)->userhash;
		}
		return false;
    }

    public function isloggedIn() {
        if(!$this->loggedIn){
			$this->loggedIn = $this->isSessionValid();
		}
		return $this->loggedIn;
    }

	protected function getIp(){
		if (getenv('HTTP_CLIENT_IP')) {
			$ipAddress = getenv('HTTP_CLIENT_IP');
		} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ipAddress = getenv('HTTP_X_FORWARDED_FOR');
		} elseif (getenv('HTTP_X_FORWARDED')) {
			$ipAddress = getenv('HTTP_X_FORWARDED');
		} elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ipAddress = getenv('HTTP_FORWARDED_FOR');
		} elseif (getenv('HTTP_FORWARDED')) {
			$ipAddress = getenv('HTTP_FORWARDED');
		} elseif (getenv('REMOTE_ADDR')) {
			$ipAddress = getenv('REMOTE_ADDR');
		} else {
			$ipAddress = '127.0.0.1';
		}
		return $ipAddress;
	}

    private function getUserData($u){
		if($u){
			$qty = "SELECT `ID`, `hash`, `user`, `name`, `email` FROM `users` WHERE (`user` = :user OR `email` = :user) LIMIT 1;";
			$qty = $this->pdoDB->prepare($qty);
			if($qty->execute(['user' => $u])){
				return $qty->fetch(\PDO::FETCH_OBJ) ?? false;
			}
		}
		return false;
	}

	public function createSession($userData, $ip){
		$tempAc = $this->isSessionValid();
		if(!$tempAc){
			$hashT = sha1($this->sha1key.microtime());
			$agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
			
			$query = "INSERT INTO `sessions` (`ID`, `hash`, `userhash`, `expiration`, `ip`, `agent`, `cookie`) VALUES (:userID, :hash, :uHash, NOW() + INTERVAL 30 MINUTE, :ip, :agent, '')
			ON DUPLICATE KEY UPDATE `userhash`= :uHash, `hash` = :hash, `expiration` = NOW() + INTERVAL 30 MINUTE, `ip` = :ip, `agent` = :agent;";
			$qp = $this->pdoDB->prepare($query);
			$qr = [
				'userID'    => $userData->ID,
				'uHash'      => $userData->hash,
				'hash'      => $hashT,
				'ip'        => $ip,
				'agent'     => $agent
			];
			if (!$qp->execute($qr)) {
				return ["Erro inesperado", false];
			}
			
			$query = "UPDATE `users` SET `last_login` = NOW() WHERE `ID` = :uID";
			$qp = $this->pdoDB->prepare($query);
			$qp->execute(["uID" => $userData->ID]);
			
			setcookie($this->cookieName, $hashT,[
				'expires' => time() + 3600*2,
				'path' => '/',
				'domain' => strtok($_SERVER['HTTP_HOST'], ':'),
				'secure' => ($_SERVER['HTTP_HOST'] == "on") ? true : false,
				'httponly' => false,
				'samesite' => 'Strict',
			]);
			return ["Logado com sucesso", true];
		} else {
			$this->unsetCk();
			$this->deleteSession($tempAc);
			return $this->createSession($userData, $ip);
		}
		return ["Falha inesperada", false];
	}

	private function checkCredentials($user, $pass){
		$qry = $this->pdoDB->prepare("SELECT `password` FROM `users` WHERE (`user` = :user OR `email` = :user) LIMIT 1;");
		$qry->execute(['user' => $user]);
		$user = $qry->fetch(\PDO::FETCH_OBJ);
		if(!isset($user->password)) return false;
		return password_verify($pass, $user->password);
	}

    private function hashIt($ps){
        return password_hash($ps, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    public function login($user, $password){
        if($this->checkCredentials($user, $password)){
            session_start();
            $userData = $this->getUserData($user);
            return $this->createSession($userData, $this->getIp(), $this->pdoDB);
		}else{
			return ["Credenciais incorretas", false];
        }
		return ["Credenciais incorretass", false];
	}

	public function register($name, $email, $nickname, $password){
        if(!($name && $email && $password && $nickname)) return ['Falha ao registrar', false];
        if(strlen($password) < 4) return ["Insira uma senha com mais de 4 caracteres.", false];
        if(strlen($email) < 4) return ["Email inválido.", false];
        if(strlen($name) < 4) return ["Nome inválido.", false];
        if(strlen($nickname) < 4) return ["Tamanho mínimo do nickname é de 4 caracteres", false];
		$password = $this->hashIt($password);
		$this->pdoDB->beginTransaction();
		try {
			$sql = "INSERT INTO `users` (`ID`, `email`, `user`, `password`, `role`, `hash`, `created`, `last_login`) VALUES (NULL, :email, :nick, :password, '0', :uhash, :creationDt, :creationDt);";
			$sql = $this->pdoDB->prepare($sql);
			$identiCode = openssl_random_pseudo_bytes(8, $psjbyte);
			$data = [
				'name' => $name,
				'email' => $email,
				'nick' => $nickname,
				'password' => $password,
				'creationDt' => (new \DateTime())->format("Y-m-d H:i:s"),
				'uhash' => bin2hex($identiCode)
			];
			$sql->execute($data);
			if ($sql->rowCount() === 0)
				throw new \PDOException('Failed to create user');

			$this->pdoDB->commit();
			return ["Cadastro realizado", true];
		} catch (\PDOException $err) {
			$this->pdoDB->rollBack();
			return [strpos($err->getMessage(),"Duplicate entry") ? "Usuário já existente" : "Falha ao registrar", false];
		}
		return ["Falha ao registrar", false];
		
	}

	function emailExists($email){
		$sql = $this->tmDB->prepare("SELECT `ID` from `users` WHERE `email` = :email LIMIT 1;");
		$sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
			$uID = $sql->fetch(\PDO::FETCH_OBJ);
			return $uID->ID;
        }
        return false;
	}

	function nickExists($nick){
		$sql = $this->tmDB->prepare("SELECT `ID` from `users` WHERE `nickname` = :nick LIMIT 1;");
		$sql->bindValue(':nick', $nick);
        $sql->execute();
        if($sql->rowCount() > 0){
			$uID = $sql->fetch(\PDO::FETCH_OBJ);
			return $uID->ID;
        }
        return false;
	}
}
?>
