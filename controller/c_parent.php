<?php
session_start();
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location: ../controller/c_index.php');
}
if($_SESSION['stats'] != 'parent') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location: ../controller/c_prof.php');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location: ../controller/c_viescolaire.php');
	}
	if($_SESSION['stats'] == 'eleve') {
		return header('Location: ../controller/c_eleve.php');
	}
}
include ('../model/m_fonctions.php');
include ('../view/v_parent.php');

?>
