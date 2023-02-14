<div class="container-fluid py-3 bg-abstract">
    <div class="col-sm-6 mx-auto p-5 my-5 transparent-bg">
        <h2 class="h-text text-center mb-3">Добавить статью</h2>
        <form action="/addArticle" method="post" class="my-5">
            <div class="my-3">
                <input type="text" class="form-control form-red" name="title" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="content" placeholder="Контент" class="form-control form-red"></textarea>
            </div>
            <div class="mb-3">
                <input name="author" type="text" class="form-control form-red" placeholder="Автор">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn sliding-button">
            </div>
        </form>
    </div>
</div>
