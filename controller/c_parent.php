<?php
session_start();

require ('../model/m_fonctions.php');

if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location:accueil');
}

if($_SESSION['stats'] != 'parent') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location:prof');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location:viescolaire');
	}
	if($_SESSION['stats'] == 'eleve') {
		return header('Location:eleve');
	}
}

require ('../view/v_parent.php');

?>
