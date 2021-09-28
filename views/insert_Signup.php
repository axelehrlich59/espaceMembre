<?php

require '../src/config.php';

$db = connection();

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

$sqlInsertData = "INSERT INTO user (email, password, pseudo) values(:email,:password, :pseudo)";
    $reqInsertData = $db->prepare($sqlInsertData);
    $reqInsertData->bindParam(":email",$email);
    $reqInsertData->bindParam(":pseudo",$pseudo);
    $reqInsertData->bindParam(":password",$hash_password);
    $reqInsertData->execute();

    header('Location: ../views/login.php');

    ?>

