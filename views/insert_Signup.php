<?php

require '../src/config.php';

$db = connection();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

$sqlInsertData = "INSERT INTO user (email, password) values(:email,:password)";
    $reqInsertData = $db->prepare($sqlInsertData);
    $reqInsertData->bindParam(":email",$email);
    $reqInsertData->bindParam(":password",$hash_password);
    $reqInsertData->execute();

    header('Location: ../views/login_page');

    ?>

