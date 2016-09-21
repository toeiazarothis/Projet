<?php
session_start();
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location: c_index.php');
}
if($_SESSION['stats'] != 'prof') {
	if($_SESSION['stats'] == 'eleve') {
		return header('Location: c_eleve.php');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location: c_viescolaire.php');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location: c_parent.php');
	}
}
include ('../model/m_fonctions.php');
include ('../view/v_prof.php');

?>
