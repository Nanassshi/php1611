<?php
class ArticleController{
    public static function addArticle($title, $content, $author){
        global $mysqli;
        $mysqli->query("INSERT INTO articles (title, content, author) VALUES ('$title', '$content', '$author')");
        header("Location: /");
    }
    public static function getArticle($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles WHERE id = $articleId");
        $row = $result->fetch_assoc();
        $content = "
            <div class='container-fluid bg-abstract py-4'>
                <div class='col-sm-6 mx-auto py-5 transparent-bg px-3'>
                    <h1 class='h-text'>".$row['title']."</h1>
                    <div class='h-text'>".$row['content']."</div>
                    <div class='h-text pt-3'>".$row['author']."</div>
                    <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                        <a href='/deleteArticle/".$row['id']."' class='btn my-3' style='background: #7d0805; color: #322c34'>Удалить</a>
                    </div>
                </div>
            </div>";
        return $content;
        /*return json_encode($row);*/
    }

    public static function deleteArticle($articleId){
        global $mysqli;
        $mysqli->query("DELETE FROM articles WHERE id = $articleId");
        header("Location: /");
    }
}
