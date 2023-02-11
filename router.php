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
if($path[1]=="reg" and $method=="GET"){ // $method = "GET" & $path = ["", "reg"]
    $content = file_get_contents("reg.php");
}else if($path[1]=="reg" and $method=="POST"){ // $path = ["", "reg"] & $method = "POST"
    UsersController::reg($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['pass']);
}else if ($path[1]=="login" and $method=="GET"){ // $path = ["", "login"] & $method = "GET"
    $content = file_get_contents('login.php');
}else if($path[1]=="login" and $method=="POST"){ // $path = ["", "login"] & $method = "POST"
    UsersController::login($_POST['email'], $_POST['pass']);
}else if($path[1]=="hello") { // $path = ["", "hello"]
    $content = file_get_contents('hello.php');
}else if($path[1]=="profile"){ // $path = ["", "profile"]
    $content = file_get_contents('profile.php');
}else if($path[1] == "addArticle" and $method=="GET"){ // $path = ["", "addArticle"] & $method = "GET"
    $content = file_get_contents('addArticle.php');
}else if($path[1] == "addArticle" and $method=="POST"){ // $path = ["", "addArticle"] & $method = "POST"
    ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']);
}else if($path[1] == ""){} // $path = ["", ""]
else if($path[1] == "article" and $method=="GET"){ // $path = ["", "article"] & $method = "GET"
    $content = file_get_contents('article.html');
}else if($path[1] == "article" and $method=="POST"){ // $path = ["", "article"] & $method = "POST"
    exit(ArticleController::getArticle($path[2]));
}else if($path[1] == "deleteArticle"){ // $path = ["", "deleteArticle"]
    exit(ArticleController::deleteArticle($path[2]));
}else if($path[1] == "getUserData"){ // $path = ["","getUserData"]
    UsersController::getUserData();
}
else{
    echo "Страница не найдена 404";
}
require_once('template.php'); // включение template в код