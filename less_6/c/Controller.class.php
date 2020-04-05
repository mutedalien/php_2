<?php

session_start();

abstract class Controller
{
    public function request($method)
    {
	    $this -> before();
	    $this -> header();
        $this -> $method(); 
        $this -> footer();
    }
    protected abstract function before();
    protected abstract function header();
    protected abstract function footer();

    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    protected function isGet() 
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
    public function __call($name, $params)
    {
        die('Неверный url...');
    }
}