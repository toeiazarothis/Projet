<?php
//On demarre les sessions
session_start();

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
mysqli_connect("127.0.0.1", "root", "jossjoss1967", "bdd");
//mysql_select_db('bdd');

//Email du webmaster
$mail_webmaster = 'josselynh@yahoo.com';

//Adresse du dossier de la top site
//$url_root = 'http://www.example.com/';
$url_root = '/espace_membre/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'indexx.php';

//Nom du design
$design = 'default';
?>
