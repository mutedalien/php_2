<?php
include_once 'Singleton.trait.php';
class GetSingleton
{
    // трейт синглтона
    use Singleton;
    protected function init()
    {
        echo '<br>ПРОВЕРКА СВЯЗИ<br>';
    }
}
?>