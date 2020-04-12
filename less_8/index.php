<?php

require_once 'autoload.php';

$method = (isset($_GET['method'])) ? $_GET['method'] : 'index'; 
if (isset($_GET['class'])) {
    if ($_GET['class'] === 'page') {
        $controller = new PageC();
    } elseif ($_GET['class'] === 'user') {
        $controller = new UserC();
    } elseif ($_GET['class'] === 'admin') {
        $controller = new AdminC();
    } elseif ($_GET['class'] === 'catalog') {
        $controller = new CatalogC();
    } elseif ($_GET['class'] === 'basket') {
        $controller = new BasketC();
    }
} else {
    $controller = new PageC();
}
// print_r($_SERVER['HTTP_REFERER']);
$controller -> request($method);