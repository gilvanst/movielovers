<?php

require_once "globals.php";
require_once "conexao.php";
require_once "models/user.php";
require_once "models/message.php";
require_once "dao/userDAO.php";


$message = new Message($BASE_URL);

$userDao = new UserDAO($conn, $BASE_URL);

//Resgata o tipo do fomulário

$type = filter_Input(INPUT_POST, "type");

//Verifica o tipo formulário

if($type === "register") {

    $name = filter_Input(INPUT_POST, "name");
    $lastname = filter_Input(INPUT_POST, "lastname");
    $email = filter_Input(INPUT_POST, "email");
    $password = filter_Input(INPUT_POST, "password");
    $cpassword = filter_Input(INPUT_POST, "cpassword");

    //Verificação de dados mínimos

    if($name && $lastname && $email && $password) {

        //verificar se as senhas batem
        if($password === $cpassword) {

            //verifica se email já está cadastrado
            if($userDao->findByEmail($email) === false) {

                echo "Nenhum usuário encontrado!!";
                
            }else {
                
            //mensagem de email já cadastrado
            $message->setMEssage("Usuário já cadastrado, tente outro email!!", "error", "back");

            }
        }else {
        
        //mensagem de erro de senha
        $message->setMEssage("Senhas não conferem!", "error", "back");

        }

    }else {

        //mensagem de erro de envio
        $message->setMEssage("Preecha todos os campos!!", "error", "back");
    }


}else if ($type === "login") {

}