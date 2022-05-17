<?php
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();

$pages = ['home', 'add', 'update', 'delete','teacher','add-teacher','update-teacher','delete-teacher'];

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){

    if(isset($_GET['page'])){
        if(in_array($_GET['page'],$pages)){
            $page = $_GET['page'];
            $home->index($page);
        }else{
            include('views/includes/404.php');
        }
    }else{
        $home->index('home');
    }
    require_once './views/includes/footer.php';
}else{
    $home->index('login');
}