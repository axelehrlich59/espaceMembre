<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
<form method="POST" action="../views/login_verif.php">
    <div class="d-flex justify-content-center mt-5">
        <h1>Une fois inscrit, veuillez vous connecter</h1>
    </div>
    <div class="form-group d-flex justify-content-center mt-5">
        <input type="email" class="form-control col-md-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
        <input type="password" class="form-control col-md-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" name="password">
        <button type="submit" class="btn btn-primary">Connexion</button>
    </div>
  

</form>
</body>
</html>

