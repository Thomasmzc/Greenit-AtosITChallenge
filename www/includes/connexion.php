<?php

// BDD CONNECTION
try{ 
  	/*
    $bdd = new PDO("mysql:host=localhost;dbname=green;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec("SET NAMES UTF8");*/
     
    $bdd = new PDO("mysql:host=greeniwlist.mysql.db;dbname=greeniwlist;charset=utf8", 'greeniwlist', 'greenANT2021', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec("SET NAMES UTF8");
    
   
  }
    catch(Exception $e)
{
        die("Erreur : ".$e->getMessage());
}
?>