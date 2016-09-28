<?php
session_start();
include ('../model/m_fonctions.php');
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location: c_index.php');
}
if($_SESSION['stats'] != 'eleve') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location: c_prof.php');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location: c_viescolaire.php');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location: c_parent.php');
	}
}
include ('../view/v_eleve.php');
?>
