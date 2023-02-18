<?php
class UsersController{
    public static function login($email, $pass){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `Users` WHERE email = '$email'");
        if($result->num_rows){
            $row = $result->fetch_assoc();
            if(password_verify($pass, $row['password'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                header("Location: /profile");
            }else{
                header("Location: /login.php?m=error");
            }
        }else{
            header("Location: /login.php?m=error");
        }
    }

    public static function reg($name, $lastname, $email, $pass){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `Users` WHERE email = '$email'");
        if($result->num_rows){
            exit("Такой пользователь уже существует");
        }else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $mysqli->query("INSERT INTO `Users`(`name`, `lastname`, `email`, `password`) VALUES ('$name','$lastname','$email','$pass')");
            header('Location: /login');
        }
    }

    public static function getUserData(){
        // array
        $userData = [
            'name' => $_SESSION['name'],
            'lastname' => $_SESSION['lastname'],
            'email' => $_SESSION['email'],
            'id' => $_SESSION['id']
        ];
        // преобразуем array в json
        $jsonUserData = json_encode($userData);
        // показываем на экране данные в формате json
        exit($jsonUserData);
    }

    public static function getUsers(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM Users");
        $users = [];
        while (($row = $result->fetch_assoc()) != null) { // получаем всех пользователей в массиве
            $users[] = $row;
        }
        return json_encode($users);
    }

    public static function logout(){
        session_destroy();
        header("Location: /");
    }
}