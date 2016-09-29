<?php
include ('../.confidentiel/private.inc.php');

function connectionDB(){
	$nomServeur = "mysql.hostinger.fr";
	$nomDB = "u240317083_notes";
	$utilisateurServeur = UTILISATEUR;
	$motDePasse = PASS;

	try {
		$bdd = new PDO("mysql:host=$nomServeur;dbname=$nomDB", $utilisateurServeur, $motDePasse, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		return ('Echec de connection, raison: <strong>'. $e->getMessage().'<strong>.');
	}
	return $bdd;
}


 ?>
