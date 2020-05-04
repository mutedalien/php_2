<?php

class PageC extends BaseC
{
    public function index()
    {
        $this -> title .= ' | Главная';
        $welcome = "Приветствуем в гостиничном комплексе «Муромская усадьба»! .";
        $vars = [
            'welcome' => $welcome
        ];
        MyTwigM::myTwigTemplate('main.twig', $vars);        
    }
    public function read()
    {
        $this -> title .= ' | Чтение';
        $text = TextM::textGet(); 
        
        $vars = array(
            'text' => $text
        );
        MyTwigM::myTwigTemplate('read.twig', $vars);
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
        $vars = array(
            'text' => $text
        );
        MyTwigM::myTwigTemplate('edit.twig', $vars);
    }
}
