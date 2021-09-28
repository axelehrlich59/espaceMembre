<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Acceuil</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <a href="views/login.php"><button class="btn btn-primary">Connexion</button></a>
    </nav>

    <div class="d-flex justify-content-center mt-5 mb-5">
        <h1>Pas encore inscrit ? </h1>
    </div>

    <form method="POST" action="views/insert_Signup.php">
    <div class="form-group d-flex justify-content-center">
            <input type="email" class="form-control col-md-3 mr-1" id="exampleInputEmail1" placeholder="Email" name="email">

            <input type="password" class="form-control col-md-3 ml-1 mr-2" id="exampleInputPassword1" placeholder="Mot de passe" name="password">

            <input type="text" class="form-control col-md-3 ml-1 mr-2" id="exampleInputPassword1" placeholder="Votre pseudo" name="pseudo">
            
            <button type="submit" class="btn btn-primary">S'inscrire</button>
    </div>
  
</form>


</body>
</html>