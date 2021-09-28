<?php

session_start();

require '../src/config.php';

$db = connection();

    // If session exist, display element into the page if not redirection to main page

    if(!isset($_SESSION['user'])){
        header('Location: ../views/index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $db->prepare('SELECT * FROM user WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Espace membre</title>
</head>
<body>
    <div class="d-flex justify-content-center mt-4">
        <h1>Bienvenue dans l'espace membre, <label style="color:purple"><?= $data['pseudo'] ?></label></h1>
    </div>

    <div class="d-flex justify-content-center "> 
        <div class="card">
                <div class="card-header d-flex justify-content-center">
                    Profil de <label class="ml-1" style="color:blueviolet"><?= $data['pseudo']; ?></label>
                </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Pseudo : <?= $data['pseudo'];?></li>
                    <li class="list-group-item">Email : <?= $data['email'];?></li>
                    <li class="list-group-item">Mot de passe : <input class="form-control" type="password" placeholder="Readonly input here…" value="<?= $data['password'];?>" readonly></li>
                    <li class="list-group-item"><a class="d-flex justify-content-center mt-1"><button class="btn btn-danger">Déconnexion</button></a></li>
                </ul>
            </div>
        </div>
    </div>    
        

</body>
</html>