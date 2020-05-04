<?php

class PageC extends BaseC
{

    public function read()
    {
        $this -> title .= ' | Чтение';
        $text = TextM::textGet(); 
        $loader = new Twig_Loader_Filesystem('v'); 
        $twig = new Twig_Environment($loader); 
        $template = $twig -> loadTemplate('read.twig');
        $vars = array(
            'text' => $text
        );
        echo $template -> render($vars);
    }
    
    public function edit()
    {
        $this -> title .= ' | Редактирование';
        
        if ($this -> isPost()) { 
            TextM::textSet($_POST['text']);
            header('location: index.php'); 
            exit(); 
        }
        
        $text = TextM::textGet();
        $loader = new Twig_Loader_Filesystem('v'); 
        $twig = new Twig_Environment($loader); 
        $template = $twig -> loadTemplate('edit.twig');
        $vars = array(
            'text' => $text
        );
        echo $template -> render($vars);
    }
}
