<?php

class User {
	private $id;
	private $username;
	private $password;
	
	private $inviteCode;
	
	private $mysqlconnect;
	
	public function __construct()
    {   
        $this->mysqlconnect=new mysqli('localhost', 'root', 'root','ITService');
        if ($this->mysqlconnect->connect_errno)
            die("Connection to database failed");
    }
	
                                                                          
          
	public function login($username, $password)
	{
		/*$this->username = $this->mysqlconnect->real_escape_string($username);
		$this->password = $password;
		// Вытаскиваем из БД запись, у которой логин равняеться введенному
		$data = mysqli_fetch_array($this->mysqlconnect->query("SELECT ID, GROUP_ID,PASSWORD FROM accounts WHERE USERNAME='".$this->mysqlconnect->real_escape_string($this->username)."' LIMIT 1"));
		// Сравниваем пароли
		if($data['PASSWORD'] === md5(md5($this->password)))
		{
			// Генерируем случайное число и шифруем его
			$hash = md5($this->generateCode(10));
			// Записываем в БД новый хеш авторизации
			$this->mysqlconnect->query("UPDATE accounts SET HASH='".$hash."' WHERE ID='".$data['ID']."'");

			$_SESSION['isAuthorized'] = 1;
			$_SESSION['ID'] = $data['ID'];
			$_SESSION['group'] = $data['GROUP_ID'];
			
			return true; //вместо header("Location: profile.php"); exit(); 
		}
		else
		{
			return false;
		}*/
	}
	
	public function logout()
	{
		session_unset();
		session_destroy();
		unset($_COOKIE);
	}
	
	public function register($username, $password, $inviteCode)
	{
		$err = [];
		$this->username = $this->mysqlconnect->real_escape_string($username);
		$this->password = $this->mysqlconnect->real_escape_string($password);
		$this->inviteCode = trim($this->mysqlconnect->real_escape_string($inviteCode));

		// проверям логин
		if(!preg_match("/^[a-zA-Z0-9]+$/",$this->username))
		{
			$err[] = "Логин может состоять только из букв английского алфавита и цифр";
		}

		if(strlen($this->username) < 3 or strlen($this->username) > 30)
		{
			$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
		}

		// проверяем, не сущестует ли пользователя с таким именем
		$query = $this->mysqlconnect->query("SELECT ID FROM accounts WHERE USERNAME='".$this->username."'");
		if(mysqli_num_rows($query) > 0)
		{
			$err[] = "Пользователь с таким логином уже существует в базе данных";
		}

		$query = mysqli_fetch_array($this->mysqlconnect->query("SELECT CODE FROM invite_codes WHERE CODE='".$this->inviteCode."'"));
		if ($query['CODE'] != $this->inviteCode)
		{
			$err[] = "Введенный инвайт-код не действителен";
		}
		// Если нет ошибок, то добавляем в БД нового пользователя
		if(count($err) == 0)
		{
			// Убираем лишние пробелы и делаем двойное хеширование
			$passwordHash = md5(md5(trim($this->password)));
			$this->mysqlconnect->query("INSERT INTO accounts SET USERNAME='".$this->username."', PASSWORD='".$passwordHash."'");
			$this->mysqlconnect->query("DELETE FROM invite_codes WHERE CODE='".$this->inviteCode."'");
			$result['RESULT'] = true;
			$result['MESSAGE'] = 'Регистрация прошла успешно';
		}
		else
		{
            $result['RESULT'] = false;
            $result['MESSAGE'] = $err;
        }
        return $result;
    }
		
	public function changePassword($password, $id = NULL)
	{
		$password = $this->mysqlconnect->real_escape_string($password);
		if(isset($id))
		{
			$id = intval($id);
		}
		else
		{
			$id = intval($_SESSION['ID']);
		}
		$passwordHash = md5(md5($password));
		$this->mysqlconnect->query("UPDATE accounts SET accounts.PASSWORD='".$passwordHash."' WHERE ID=".$id);
	}
		
	public function createInviteCode($id)
	{
		if (strlen($id) <= 2)
		{
			$id = intval($id);
		}
		else
		{
			$id = $this->getUsernameOrID($id);
		}
		$inviteCode = $this->generateCode();
		$this->mysqlconnect->query("INSERT INTO invite_codes (CODE,OWNER_ID) VALUES('".$inviteCode."','".$id."');");
	}

                                                                                                      

	private function generateCode($length=6) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length) {
				$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
	}
	

	public function getUsernameOrID($user)
	{
		if (strlen($user) < 3)
		{
			$data = mysqli_fetch_array($this->mysqlconnect->query("SELECT USERNAME FROM accounts WHERE ID='".$user."' LIMIT 1"));
			return $data['USERNAME'];
		}
		else
		{
			$data = mysqli_fetch_array($this->mysqlconnect->query("SELECT ID FROM accounts WHERE USERNAME='".$user."' LIMIT 1"));
			return $data['ID'];
		}
	}
	
	public function getUserList($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL)
	{
		if (isset($var1) && isset($var2) && isset($var3) && isset($var4)) 
		{
			$userDataMYSQL = $this->mysqlconnect->query("SELECT ".$var1.", ".$var2.", ".$var3.", ".$var4."  FROM accounts");
		}
		elseif(isset($var1) && isset($var2) && isset($var3))
		{
			$userDataMYSQL = $this->mysqlconnect->query("SELECT ".$var1.",".$var2.",".$var3."  FROM accounts");
		}
		elseif(isset($var1) && isset($var2))
		{
			$userDataMYSQL = $this->mysqlconnect->query("SELECT ".$var1.",".$var2." FROM accounts");
		}
		elseif(isset($var1))
		{
			$userDataMYSQL = $this->mysqlconnect->query("SELECT ".$var1."  FROM accounts");
		}
		else
		{
			$userDataMYSQL = $this->mysqlconnect->query("SELECT * FROM accounts");
		}
		if (mysqli_num_rows($userDataMYSQL)) 
		{
			$userData = array();
			while($userInfo = mysqli_fetch_array($userDataMYSQL)) 
			{
				$userData[] = $userInfo;
			}
			return $userData;
		}
		else
		{
			return NULL;
		}
	}
	
	
	
	public function isAuthorized()
	{
		return ($_SESSION['isAuthorized'] == 1) ?  true : false;
	}
	
	public function isAdmin()
	{
		return ($_SESSION['group'] == 1) ?  true : false;
	}

	
}	
?>
