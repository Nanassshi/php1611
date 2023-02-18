<?php
session_start();
// "/deleteArticle/2" -> $path = ["", "deleteArticle", "2"] -> if($path[1] == "deleteArticle"){выполняем инструкции удаления статьи}
// "/reg" -> $path = ["", "reg"] -> if($path[1] == "reg"){открывем страницу регистрации}
// "/login" -> $path = ["", "login"] -> if($path[1] == "login"){открываем страницу авторизации}
$requestURI = $_SERVER['REQUEST_URI']; // Получаем URI по которому запрошена страница
$method = $_SERVER['REQUEST_METHOD']; // Получаем метод запроса
$path = explode('/', $requestURI); // Разбиваем URI по "/"
require_once('php/db.php');  // включение db.php в код
require_once('php/classes/UsersController.php'); // включение UsersController в код
require_once('php/classes/ArticleController.php'); // включение ArticleCon в код
if($path[1]=="reg" and $method=="GET"){
    $content = file_get_contents("reg.php");
}else if($path[1]=="reg" and $method=="POST"){
    UsersController::reg($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['pass']);
}else if ($path[1]=="login" and $method=="GET"){
    $content = file_get_contents('login.php');
}else if($path[1]=="login" and $method=="POST"){
    UsersController::login($_POST['email'], $_POST['pass']);
}else if($path[1]=="hello") {
    $content = file_get_contents('hello.php');
}else if($path[1]=="profile"){
    if($_SESSION['id']){
        $content = file_get_contents('profile.php');
    }else{
        header('Location: /login');
    }
}else if($path[1] == "addArticle" and $method=="GET"){ //
    $content = file_get_contents('addArticle.php');
}else if($path[1] == "addArticle" and $method=="POST"){
    ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']);
}else if($path[1] == ""){}
else if($path[1] == "article" and $method=="GET"){
    $content = file_get_contents('article.html');
}else if($path[1] == "article" and $method=="POST"){
    exit(ArticleController::getArticle($path[2]));
}else if($path[1] == "updateArticle" and $method=="GET"){
    $content = file_get_contents('updateArticle.html');
}else if($path[1] == "updateArticle" and $method=="POST"){
    if($_SESSION['id']){
        ArticleController::updateArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author']);
    }else{
        header('Location: /login');
    }
}else if($path[1] == "deleteArticle"){
    ArticleController::deleteArticle($path[2]); exit;
}else if($path[1] == "getUsers" and $method=="GET"){
    exit(UsersController::getUsers());
}else if($path[1] == "users"){
    $content = file_get_contents('users.html');
}else if($path[1] == "exit"){
    UsersController::logout();
}else if($path[1] == "getUserData"){
    UsersController::getUserData();
}
else{
    echo "Страница не найдена 404";
}
require_once('template.php');