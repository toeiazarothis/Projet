<?php
define('UTILISATEUR','u240317083_admin');
define('PASS','root');

function connexionDB(){
  $connexion = new PDO('mysql:host=mysql.hostinger.fr;dbname=u240317083_notes', UTILISATEUR, PASS);
}
 ?>
