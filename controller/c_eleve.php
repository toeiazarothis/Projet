<?php
session_start();

require ('../model/m_fonctions.php');

if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location:accueil');
}

if($_SESSION['stats'] != 'eleve') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location:prof');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location:viescolaire');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location:parent');
	}
}

if (isset ($_GET['es']))
{
	echo errorOrSuccesOnSite ($_GET['es']);
}

require ('../view/v_eleve.php');
?>
