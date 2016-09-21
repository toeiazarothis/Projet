<?php
session_start();
include ('../model/m_fonctions.php');
if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	// return header('Location: /accueil');
	return '<script>window.location.href = "accueil";</script>';
}
include ('../view/v_eleve.php');
?>
