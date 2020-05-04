<?php

abstract class BaseC extends Controller
{
    protected $title; 
    protected $content; 
    protected $is_admin; 
    
    public function __construct(){}
    public function before()
    {
        $this -> title = 'Домашнее задание №6';
        $this -> content = '';
        if (isset($_SESSION['is_admin'])) {
            $this -> is_admin = $_SESSION['is_admin'];
        }
    }
    public function header()
    {
        $get_user = new UserM();
        if (isset($_SESSION['user_id'])) {
            $user_info = $get_user -> getUser($_SESSION['user_id']);
// print_r($user_info);
        } else {
            $user_info['name'] = false;
        }
        $vars = array( 
            'title' => $this -> title,
            'content' => $this -> content, 
            'user_name' => $user_info['name'],
            'is_admin' => $this -> is_admin
        );
        MyTwigM::myTwigTemplate('header.twig', $vars);
    }
    public function footer()
    {
        $vars = array(
            'this_date' => date('o')
        );
        MyTwigM::myTwigTemplate('footer.twig', $vars);
    }
}
