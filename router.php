<?php
    session_start(); // начало новой сессии
    $requestURI = $_SERVER['REQUEST_URI']; // придаем переменной значение строки ссылки
    $method = $_SERVER['REQUEST_METHOD']; // указываем в переменную способ передачи данных
    $path = explode('/', $requestURI); // разбиваем $requestURI на массив, элементы которого делятся по "/"
    require_once('php/db.php'); // включение db.php в код данного файла
    require_once('php/classes/UsersController.php'); // включение UsersController.php в код данного файла
    require_once('php/classes/ArticleController.php'); // включение ArticleController.php в код данного файла
    if($path[1]=="reg" and $method=="GET"){ //path = ["", "reg"] & $method = "GET"
        $content = file_get_contents("reg.php"); // проверка метода получения данных и строки ссылки, чтобы придать $content значение reg.php
    }else if($path[1]=="reg" and $method=="POST"){ //path = ["", "reg"] & $method = "POST"
        UsersController::reg($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['pass']); // проверка метода получения данных и строки ссылки для выполнения функции reg
    }else if ($path[1]=="login" and $method=="GET"){ //path = ["", "login"] & $method = "GET"
        $content = file_get_contents('login.php'); // проверка метода получения данных и строки ссылки, чтобы придать $content значение login.php
    }else if($path[1]=="login" and $method=="POST"){ //path = ["", login] & $method = "POST"
        UsersController::login($_POST['email'], $_POST['pass']); // проверка метода получения данных и строки ссылки для выполнения функции login
    }else if($path[1]=="profile"){ //path = ["", "profile"]
        $content = file_get_contents('profile.php'); // проверка метода получения данных и строки ссылки, чтобы придать $content значение profile.php
    }else if($path[1]=="hello"){ //path = ["", "hello"]
        $content = file_get_contents('hello.php'); // проверка метода получения данных и строки ссылки, чтобы придать $content значение hello.php
    }else if($path[1] == "addArticle" and $method=="GET"){ //path = ["", "addArticle"] & $method = "GET"
        $content = file_get_contents('addArticle.php'); // проверка метода получения данных и строки ссылки, чтобы придать $content значение addArticle.php
    }else if($path[1] == "addArticle" and $method=="POST"){ //path = ["", "addArticle"] & $method = "POST"
        ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']); // проверка метода получения данных и строки ссылки для выполнения функции addArticle
    }else if($path[1] == ""){} //path = ["",""]
    /* else if($path[1] == "article" and $method=="GET"){     <- проверка для метода json
         $content = file_get_contents('article.html');}       <- проверка для метода json */
    else if($path[1] == "article"){ //path = ["","article"]
        $content = ArticleController::getArticle($path[2]); // проверка строки ссылки для выполнения функции getArticle
    }else if($path[1] == "deleteArticle"){ //path = ["","deleteArticle"]
        ArticleController::deleteArticle($path[2]); // проверка строки ссылки для выполнения функции deleteArticle
    }else if($path[1] == "getUserData"){ //path = ["","getUserData"]
        UsersController::getUserData(); // проверка строки ссылки для выполнения функции getUserData
    }else{
        echo "Страница не найдена 404";
    }
    require_once('template.php');