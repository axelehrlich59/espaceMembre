<?php

session_start();

require '../src/config.php';


$db = connection();

if (isset($_POST['email']) AND isset($_POST['password'])) {

    

        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $db->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['user'] = $data['token'];
                    header('Location: ../views/user_espace.php');
                    die();
                }else{ header('Location: ../views/login.php?login_err=password'); die(); }
            }else{ header('Location: ../views/login.php?login_err=email'); die(); }
        }else{ header('Location: ../views/login.php?login_err=already'); die(); }
    }else{ header('Location: ../views/login.php'); die();} // si le formulaire est envoyé sans aucune données

                                            


                                                            


?>







