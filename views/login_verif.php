<?php

session_start();

require '../src/config.php';


$db = connection();

if (isset($_POST['email']) AND isset($_POST['password'])) {

    

        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // to lower case for security
        
        // If user is register into db
        $check = $db->prepare('SELECT pseudo, email, password, token FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // If we have a change into the db, the code is running
        if($row > 0)
        {
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) // Filter mail
            {
                
                if(password_verify($password, $data['password'])) // If it's good password
                {
                    // Create profile page session

                    $_SESSION['user'] = $data['token'];
                    header('Location: ../views/user_espace.php');
                    die();
                }else{ header('Location: ../views/login.php?login_err=password'); die(); }
            }else{ header('Location: ../views/login.php?login_err=email'); die(); }
        }else{ header('Location: ../views/login.php?login_err=already'); die(); }
    }else{ header('Location: ../views/login.php'); die();} // if send with no data

                                            


                                                            


?>







