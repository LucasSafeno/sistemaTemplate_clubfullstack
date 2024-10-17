<?php
namespace app\controllers;

use app\framework\database\Connection;

class LoginController{
    public function index()
    {
        dd('index loginController');
    }

    public function store()
    {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $connect = Connection::getconnection();

        if(empty($email) || empty($password)){
            dd('Usuário/senha inválidos');
        }

        $prepare = $connect->prepare('SELECT id,firstName,lastName,email,password FROM users WHERE email = :email');
        $prepare->execute([
            'email' => $email
        ]);


        $userFound = $prepare->fetchObject();

        if(!$userFound){
            dd('Usuário/senha inválidos');
        }


        if(!$passwordCheck = password_verify($password, $userFound->password))
        {
            dd('Usuário/senha inválidos, senha inválida');
        }

        

        $_SESSION['logged'] = true;
        unset($userFound->password);
        $_SESSION['user'] = $userFound;

        return redirect('/dashboard');
        

    }
}
