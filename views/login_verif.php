<?php

session_start();

require '../src/config.php';


$db = connection();

if (isset($_POST['email']) AND isset($_POST['password'])) {

    

    $email = htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);

    if(!empty($email) && !empty($password)) {
 
    // cette requête permet de récupérer l'utilisateur depuis la BD
    $requete = "SELECT * FROM user WHERE email = ? AND password = ?";
    $resultat = $db->prepare($requete);
   
    $resultat->execute(array($email, $password));
    
    $userexist = $resultat->rowCount();
	      if($userexist == 1) {
	         $userinfo = $resultat->fetch();
	         $_SESSION['id'] = $userinfo['id'];
	         $_SESSION['pseudo'] = $userinfo['pseudo'];
	         $_SESSION['email'] = $userinfo['email'];
	         header("Location: ../views/user_espace.php?id=".$_SESSION['id']);
	      } else {
              $error = 'Erreur';
              echo $error;
          }

                                            }


                                                            }


?>







