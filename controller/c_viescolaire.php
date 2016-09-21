<?php
session_start();
if(!isset($_SESSION['users'], $_SESSION['userid']) && $_SESSION['stats'] != 'viescolaire') {
	return header('Location: c_index.php');
}
if($_SESSION['stats'] != 'viescolaire') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location: c_prof.php');
	}
	if($_SESSION['stats'] == 'eleve') {
		return header('Location: c_eleve.php');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location: c_parent.php');
	}
}
include ('../model/m_fonctions.php')
include ('../view/v_viescolaire.php');?>
