<?php
session_start();
include ('../model/m_fonctions.php');
if(isset($_POST['users'], $_POST['password'])){
	return verifPassIsUser($_POST['users'], $_POST['password']);
}
include ('../view/v_index.php');
session_unset();
session_destroy();

?>
