<?php
session_start();
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location:accueil');
}
if($_SESSION['stats'] != 'prof') {
	if($_SESSION['stats'] == 'eleve') {
		return header('Location:eleve');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location:viescolaire');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location:parent');
	}
}
include ('../model/m_fonctions.php');
include ('../view/v_prof.php');

?>
