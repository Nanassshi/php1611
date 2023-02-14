<?php
require_once('php/db.php');
$result = $mysqli->query("SELECT * FROM articles");
$articles = "";
while (($row = $result->fetch_assoc()) != null){
    $articles .= "<h4><a style='text-decoration: none; color: #52505a' href='/article/".$row['id']."'>".$row['title']."</a></h4><p>".$row['content']."</p>";
}

$content = '
    <div class="container-fluid bg-abstract py-3">
        <div class="container transparent-bg col-sm-4 col-lg-8 py-5 px-3">
            <div class="py-3 px-3 mx-5" style="color: #7d0805">'. $articles. '</div>
        </div>
    </div>
        ';

require_once('router.php');