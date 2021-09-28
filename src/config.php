<?php

define('LOCALHOST', 'localhost');
define('DBNAME', 'espace_membre');
define('DBID', 'root');
define('DBMDP', '');

function connection(){
    
    try
    {
        $db = new PDO('mysql:host='.LOCALHOST.':3306;dbname='.DBNAME.'; charset=utf8', DBID, DBMDP);
        //$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur à la BD : '.$e->getMessage());
    }
}

