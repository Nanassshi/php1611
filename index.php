<?php
require_once('php/db.php');
$result = $mysqli->query("SELECT * FROM articles");
$articles = "";
while (($row = $result->fetch_assoc()) != null){
    $articles .= "
        <div class='card col-sm-12 col-lg-8 h-text py-3 px-3 mx-auto my-4' style='border: 2px solid black; background-color: #202529'>
             <img src='https://sun9-72.userapi.com/impg/Son_Xc64M-1YFpwVOysn1vKzqXabeihPOEXh7g/lYU6hmHjmEQ.jpg?size=1920x1080&quality=95&sign=b1d144d252baef7da128f73491a18b1d&type=album' 
                    class='card-img-top' style='border-radius: 1%'>
                <div class='card-body'>    
                <h3 class='h-text'><a class='card-title my-3' style='text-decoration: none' href='/article/".$row['id']."'><span class='under-hover h-text'>".$row['title']."</span></a></h3>
                <p class='card-text'>".$row['content']."</p>
             </div>
         </div>    ";
}

$content = '
    <div class="container-fluid bg-abstract py-3">
        '. $articles. ' 
    </div>
        ';

require_once('router.php');