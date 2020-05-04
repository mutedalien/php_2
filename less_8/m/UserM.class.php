<?php

class UserM
{
    protected $user_id, 
              $user_login, 
              $user_name, 
              $user_password;
                  
    public function __construct(){}
    
    public function setPass($login, $password) {
       return strrev(md5($login) . md5($password));
        //return $login . $password;
    }
    
    public function getUser($id)
    {
        $res = PdoM::Instance() -> Select(USERS, USER_ID, $id);
        // var_dump($res);
        return $res;
    }
    
        //  Регистрация пользователя
    public function regUser($name, $login, $password) 
    {
        $res = PdoM::Instance() -> Select(USERS, USER_LOGIN, $login);
        if (!$res) {
            $password = $this -> setPass($login, $password);
            $object = [
              'name' => $name,
              'login' => $login,
              'password' => $password
            ];
            $res = PdoM::Instance() -> Insert(USERS, $object);
            if (is_numeric($res)) { 
                return "regUser(): Регистрация прошла успешно.";
                
            } else {
                return "regUser(): Регистрация прервалась ошибкой.";
            }
        } else { 
            return "regUser(): Пользователь уже существует.";
        }
    }
    
        //  Вход пользователя
    public function login($login, $password) 
    {
        $res_login = PdoM::Instance()->Select(USERS, USER_LOGIN, $login);
        if ($res_login) {
            if ($res_login[USER_PASSWORD] == $this->setPass($login, $password)) {
                $_SESSION[USER_ID] = $res_login[USER_ID];
                $query = "SELECT * FROM `".BASKETS."` RIGHT JOIN `".ITEMS."` ON `".BASKETS."`.`item_id` = `".ITEMS."`.`item_id`";
                $basket_db = PdoM::Instance()->MyQuery($query, true);
                foreach ($basket_db as $basket_array) {
                    if ($basket_array[USER_ID] == $_SESSION[USER_ID]) {
                        $basket_object[$basket_array['basket_id']] = [
                            'item_id' => $basket_array['item_id'],
                            'item_name' => $basket_array['name'],
                            'count' => $basket_array['count'],
                            'option_id' => $basket_array['option_id'],
                            'price' => $basket_array['price']
                        ];
                    }
//print_r($basket_array['option_id']);
                }
//echo '<pre>$basket_object:';
//print_r($basket_db);
//echo '</pre>';

                $_SESSION['basket'] = $basket_object;

                if ($res_login[USER_IS_ADMIN] == 1) { // Проверка на админа
                    $_SESSION[USER_IS_ADMIN] = $res_login[USER_IS_ADMIN];
                    //return header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                    return header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }
        //  Выход пользователя
    public function logout()
    {
    	if (isset($_SESSION["user_id"])) {
    	    unset($_SESSION["user_id"]);
    	    unset($_SESSION['basket']);
    	    session_destroy();
    	    //return header("Location: " . $_SERVER['HTTP_REFERER']);
    	} else {
    	    return false;
    	}                      
    }
}