<?php

class UserM
{
    protected $user_id, $user_login, $user_name, $user_password;
    
    public function __construct(){}
    public function setPass($name, $password) {
	return strrev(md5($name)) . md5($password); // прячим пароли
    }
    
    public function getUser($id)
    {
        $query = "SELECT * FROM users WHERE id=" . $id;
        $res = PdoM::Instance() -> Select($query);
        return $res;
    }
    
    public function regUser($name, $login, $password) 
    {
        $query = "SELECT * FROM users WHERE login = '" . $login . "'";
        $res = PdoM::Instance() -> Select($query);
        if (!$res) {
            $password = $this -> setPass($login, $password);
            $object = [
              'name' => $name,
              'login' => $login,
              'password' => $password
            ];
            $res = PdoM::Instance() -> Insert('users', $object);
            if (is_numeric($res)) {
                return "regUser(): Регистрация прошла успешно.";
            } else {
                return "regUser(): Регистрация прервалась ошибкой.";
            }
        } else {
            return "regUser(): Пользователь уже существует.";
        }
    }
    
    public function login($login, $password) 
    {
        $query = "SELECT * FROM users WHERE login='" . $login . "'";
        $res = PdoM::Instance() -> Select($query);
        if ($res) {
            if ($res['password'] == $this -> setPass($login, $password)) {
                $_SESSION['user_id'] = $res['id'];
                return 'Добро пожаловать в систему, ' . $res['name'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }  
    }
    
    public function logout()
    {
	if (isset($_SESSION["user_id"])) {
	    unset($_SESSION["user_id"]);
	    session_destroy();
	    return true;
	} else {
	    return false;
	}
                      
    }
}