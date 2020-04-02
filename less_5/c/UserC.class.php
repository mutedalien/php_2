<?php

class UserC extends BaseC
{
    public function getUser()
    {
        $get_user = new UserM();
        $user_info = $get_user -> getUser($_SESSION['user_id']);
        $this -> title .= ' | ' . $user_info['name'];
        
        $loader = new Twig_Loader_Filesystem('v'); 
        $twig = new Twig_Environment($loader); 
        $template = $twig -> loadTemplate('user_info.twig');
        $vars = array(
            'username' => $user_info['name'],
            'userlogin' => $user_info['login']
        );
        echo $template -> render($vars);        
    }
    
    public function regUser() 
    {		
	$this -> title .= ' | Регистрация';
        
        $loader = new Twig_Loader_Filesystem('v'); 
        $twig = new Twig_Environment($loader);
        $template = $twig -> loadTemplate('user_reg.twig');
        
	if($this->isPost()) {
	    $new_user = new UserM();
	    $res = $new_user -> regUser($_POST['name'], $_POST['login'], $_POST['password']);
            echo $template -> render(array('text' => $res));
        } else {
            echo $template -> render(array());
        }
    }

    public function login() 
    {
	$this->title .= ' | Вход';
	$loader = new Twig_Loader_Filesystem('v'); 
        $twig = new Twig_Environment($loader); 
        $template = $twig -> loadTemplate('user_login.twig');
        echo $template -> render(array());
       
	if($this->isPost()) {
	    $login = new UserM();
	    $res = $login -> login($_POST['login'], $_POST['password']);
            echo $res;
	}
    }
    
    public function logout() {
	$logout = new UserM();
	$result = $logout->logout();
    }	
                
}