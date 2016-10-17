<?php
session_start();

require ('../model/m_fonctions.php');

if(isset($_POST['users'], $_POST['password'])){
	return verifPassIsUser($_POST['users'], $_POST['password']);
}

if (isset ($_GET['es']))
{
	echo errorOrSuccesOnSite ($_GET['es']);
}

require ('../view/v_index.php');

session_unset();

session_destroy();
?>
