<?php
session_start();
include ('../model/m_fonctions.php');
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('url=accueil');
}
if($_SESSION['stats'] != 'eleve') {
	if($_SESSION['stats'] == 'prof') {
		return header('url=prof');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('url=viescolaire');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('url=parent');
	}
}
include ('../view/v_eleve.php');
?>
