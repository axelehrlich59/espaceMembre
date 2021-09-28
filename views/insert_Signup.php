<?php

require '../src/config.php';

$db = connection();

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ip = $_SERVER['REMOTE_ADDR']; 

    $sqlInsertData = "INSERT INTO user (email, password, pseudo, ip, token) values(:email,:password, :pseudo, :ip, :token)";
    $reqInsertData = $db->prepare($sqlInsertData);
    $reqInsertData->bindParam(":email",$email);
    $reqInsertData->bindParam(":pseudo",$pseudo);
    $reqInsertData->bindParam(":password",$hash_password);
    $reqInsertData->bindParam(":ip",$ip);
    $reqInsertData->bindParam(":token",bin2hex(openssl_random_pseudo_bytes(64)));
    $reqInsertData->execute();

    header('Location: ../views/login.php');
} 

    else {
        header('Location: ../views/inscription.php?reg_err=password'); die(); //If password incorrect don't let access
    }



    ?>

