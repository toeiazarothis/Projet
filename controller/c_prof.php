<?php
session_start();
if(!isset($_SESSION['users'], $_SESSION['userid']) && $_SESSION['stats'] != 'prof') {
	return header('Location: c_index.php');
}
include ('../model/m_fonctions.php');
include ('../view/v_prof.php');

?>
