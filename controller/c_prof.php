<?php
session_start();
include ('../model/m_fonctions.php');
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
if (isset($_POST['eleve_appreciation'], $_POST['appreciation'])) {
	echo envoyerAppreciationEleve ($_POST['eleve_appreciation'], $_POST['appreciation']);
}
include ('../view/v_prof.php');

?>
