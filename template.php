<?php
    session_start();
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nanashi-titled</title>
        <link rel="icon" type="image/x-icon" href="imgs/icon.ico">
        <script src="https://kit.fontawesome.com/f6fcb7088a.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            .dropdown-item:hover{
                background: black;
                border-radius: 15%;
                color: rgb(253 245 230);
            }

            .under-hover{
                position: relative;
                text-decoration: none;
                color: rgb(253 245 230);
            }

            .under-hover::before {
                content: '';
                position: absolute;
                width: 100%;
                height: 3px;
                border-radius: 4px;
                background-color: rgb(253 245 230);
                bottom: 0;
                left: 0;
                transform-origin: right 100%;
                transform: scaleX(0);
                transition: transform .5s ease-in-out;
            }

            .under-hover:hover::before {
                transform: scaleX(1);
            }

            .bg-abstract{
                background-color: white;
                background-size: cover;
                background-attachment: fixed;
            }
            .transparent-bg{
                background: rgba(0, 0, 0, .8);
                border-radius: 15%;
            }
            div[class*="container"] {
                font-family: 'Comfortaa', cursive;
            }

            .h-text{
                color: rgb(253 245 230);
            }

            .form-red{
                color: rgb(253 245 230);
                background: black;
                border: rgb(253 245 230) 2px solid;
            }

            .animationLoader {
                /*фиксируем положение основного контейнера*/
                position: fixed;
                /* расставляем координаты контейнера*/
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                /* выставляем цвет фона основного контейнера */
                background: #202529;
                /* важно разместить основной блок поверх всех остальных компонентов страницы, поэтому z-index у него должен быть больше, чем у остальных */
                z-index: 1001;
            }

            .animationLoader__row {
                position: relative;
                top: 50%;
                left: 50%;
                width: 80px;
                height: 80px;
                margin-top: -45px;
                margin-left: -45px;
                text-align: center;
                animation: animationLoader-rotate 2s infinite linear;
            }


            .animationLoader__item {
                position: absolute;
                display: inline-block;
                top: 0;
                background-color: rgb(253 245 230);
                border-radius: 100%;
                width: 45px;
                height: 45px;
                animation: animationLoader-bounce 2s infinite ease-in-out;
            }
            .animationLoader__item:last-child {
                top: auto;
                bottom: 0;
                animation-delay: -1s;
            }
            @keyframes animationLoader-rotate {
                100% {
                    transform: rotate(360deg);
                }
            }

            @keyframes animationLoader-bounce {
                0%,
                100% {
                    transform: scale(0);
                }
                50%{
                    transform: scale(1);
                }
            }
            .animation_hiding .animationLoader  {
                transition: 0.3s opacity;
                opacity: 0;
            }
            .animation .animationLoader  {
                display: none;
            }

            .sliding-button {
                text-decoration: none;
                color: white;
                display: inline-block;
                padding: 15px 15px;
                border: 2px solid;
                border-image: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(104,100,94,1) 0%, rgba(253,245,230,1) 20%, rgba(253,245,230,1) 77%, rgba(113,109,103,1) 100%);
                border-image-slice: 1;
                font-family: 'Comfortaa', cursive;
                font-size: small;
                text-transform: uppercase;
                overflow: hidden;
                letter-spacing: 2px;
                transition: 0.8s cubic-bezier(.165, .84, .44, 1);
            }
            .sliding-button:before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                height: 0;
                width: 100%;
                z-index: -1;
                color: white;
                background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(104,100,94,1) 0%, rgba(253,245,230,1) 20%, rgba(253,245,230,1) 77%, rgba(113,109,103,1) 100%);
                transition: 0.8s cubic-bezier(.165, .84, .44, 1);
            }
            .sliding-button:hover {
                transition: 1s;
                background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(104,100,94,1) 0%, rgba(253,245,230,1) 20%, rgba(253,245,230,1) 77%, rgba(113,109,103,1) 100%);
            }
            .sliding-button:hover:before {
                bottom: 0;
                top: auto;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <!-- Анимация загрузки -->
        <div class="animationLoader">
            <div class="animationLoader__row">
                <div class="animationLoader__item"></div>
                <div class="animationLoader__item"></div>
            </div>
        </div>
        <!-- Конец анимации загрузки -->

        <!-- Начало меню -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
            <div class="container-fluid">
                <a class="navbar-brand h-text" href="/hello">
                    <div class="py-1 under-hover">
                        <i class="fa-brands fa-neos fa-xl fa-flip" style="--fa-animation-duration: 5s;"></i>anashi
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto my-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link h-text under-hover" aria-current="page" href="/hello">Главная</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle h-text under-hover" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Статья
                            </a>
                            <ul class="dropdown-menu" style="background: #202529">
                                <li><a class="dropdown-item h-text" href="/">Статьи</a></li>
                                <li><a class="dropdown-item h-text" href="/addArticle">Добавить статью</a></li>
                                <li><hr class="dropdown-divider h-text"></li>
                                <li><a class="dropdown-item h-text" href="/users">Пользователи</a></li>
                            </ul>
                        </li>
                    </ul>
                    <? if($_SESSION['id']): ?>
                        <a href="/exit" class="btn sliding-button me-3" style="padding: 10px 20px;">Выход</a>
                    <? else: ?>
                        <a href="/reg" class="btn sliding-button me-3" style="padding: 10px 20px;">Регистрация</a>
                        <a href="/login" class="btn sliding-button me-3" style="padding: 10px 20px;">Войти</a>
                    <?endif;?>
                </div>
            </div>
        </nav>
        <!-- Конец меню -->

        <!-- Контент -->
        <?= $content ?>
        <!-- Конец контент -->

        <script>
            window.onload = function () {
                document.body.classList.add('animation_hiding');
                window.setTimeout(function () {
                    document.body.classList.add('animation');
                    document.body.classList.remove('animation_hiding');
                }, 600);
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <footer class="bg-dark container-fluid">
            <div class="container py-5 text-center" style="color: rgb(253 245 230)">
                &copy; 1611 PHP 2023
            </div>
        </footer>
    </body>
</html>
