<?php
session_start();
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('url=accueil');
}
if($_SESSION['stats'] != 'parent') {
	if($_SESSION['stats'] == 'prof') {
		return header('url=prof');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('url=viescolaire');
	}
	if($_SESSION['stats'] == 'eleve') {
		return header('url=eleve');
	}
}
include ('../model/m_fonctions.php');
include ('../view/v_parent.php');

?>
