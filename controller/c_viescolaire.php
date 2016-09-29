<?php
session_start();
include ('../model/m_fonctions.php');
if(!isset($_SESSION['users'], $_SESSION['userid']) && $_SESSION['stats'] != 'viescolaire') {
	return header('Location: ../controller/c_index.php');
}
if($_SESSION['stats'] != 'viescolaire') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location: ../controller/c_prof.php');
	}
	if($_SESSION['stats'] == 'eleve') {
		return header('Location: ../controller/c_eleve.php');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location: ../controller/c_parent.php');
	}
}
include ('../view/v_viescolaire.php');?>
