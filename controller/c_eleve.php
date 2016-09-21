<?php
session_start();
include ('../model/m_fonctions.php');
if(!isset($_SESSION['users'], $_SESSION['userid']) && $_SESSION['stats'] != 'eleve') {
	return header('Location: c_index.php');
}
include ('../view/v_eleve.php');
?>
