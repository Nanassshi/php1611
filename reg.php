<div class="container-fluid bg-abstract py-5">
    <div class="container transparent-bg py-5 my-5 col-8">
        <h1 class="text-center my-3 h-text">Регистрация</h1>
        <div class="col-sm-5 text-center mx-auto">
            <form action="/reg" method="post">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 input-group">
                            <span class="input-group-text form-red" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input name="name" type="text" class="form-control me-1 form-red" placeholder="Имя">
                        </div>
                    </div>
                    <div class="col">
                            <div class="mb-3 input-group">
                                <span class="input-group-text form-red" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                <input name="lastname" type="text" class="form-control form-red" placeholder="Фамилия">
                            </div>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text form-red" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                    <input name="email" type="email" class="form-control form-red" placeholder="E-mail">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text form-red" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input name="pass" type="password" class="form-control form-red" placeholder="Пароль">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn sliding-button" value="Зарегистрироваться">
                </div>
            </form>
        </div>
    </div>
</div>