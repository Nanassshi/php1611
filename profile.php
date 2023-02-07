<!-- Конец меню -->
<div class="container-fluid bg-abstract py-5">
    <div class="container transparent-bg py-5 my-5 col-lg-4">
        <p class="text-center h-text">Имя: <span id="name"> </span></p>
        <p class="text-center h-text">Фамилия: <span id="lastname"> </span></p>
        <p class="text-center h-text">Email: <span id="email"> </span></p>
        <p class="text-center h-text">ID: <span id="id"> </span></p>
    </div>
</div>

<script>
    let name = document.getElementById('name');
    let lastname = document.getElementById('lastname');
    let email = document.getElementById('email');
    let id = document.getElementById('id');
    fetch('/php/getUserData.php')
        .then(function (response){return response.json()})
        .then(function (result){
            console.log(result);
            name.innerText = result.name;
            lastname.innerText = result.lastname;
            email.innerText = result.email;
            id.innerText = result.id;
        });
</script>