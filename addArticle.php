<div class="container-fluid bg-abstract py-4">
    <div class="container py-5">
        <div class="col-sm-6 mx-auto py-5 transparent-bg px-3">
            <form action="/addArticle" class="my-5" method="post">
                <div class="mb-3 h-text">
                    <input type="text" class="form-control form-red" name="title" placeholder="Заголовок">
                </div>
                <div class="mb-3 h-text">
                    <textarea name="content" class="form-control col-12 form-red" placeholder="Контент"></textarea>
                </div>
                <div class="mb-5 h-text">
                    <input type="text" class="form-control form-red" name="author" placeholder="Автор">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn sliding-button" href="/" value="Отправить">
                </div>
            </form>
        </div>
    </div>
</div>
