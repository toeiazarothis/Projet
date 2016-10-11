<?php
session_start();

include ('../model/m_fonctions.php');

if(!isset($_SESSION['users'], $_SESSION['userid']) && $_SESSION['stats'] != 'viescolaire') {
	return header('Location:accueil');
}

if($_SESSION['stats'] != 'viescolaire') {
	if($_SESSION['stats'] == 'prof') {
		return header('Location:prof');
	}
	if($_SESSION['stats'] == 'eleve') {
		return header('Location:eleve');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location:parent');
	}
}

if (isset($_POST['nom_eleve'], $_POST['prenom_eleve'], $_POST['classe_eleve'], $_POST['nom_parent'], $_POST['prenom_parent'], $_POST['adresse_parent'], $_POST['email_parent'], $_POST['tel_parent'])) {
  return addAndModifyEleveForAdmin (strtolower($_POST['nom_eleve']), strtolower($_POST['prenom_eleve']), strtolower($_POST['classe_eleve']), strtolower($_POST['nom_parent']), strtolower($_POST['prenom_parent']), strtolower($_POST['adresse_parent']), strtolower($_POST['email_parent']), strtolower($_POST['tel_parent']));
}

if (isset ($_POST['classe_for_del_eleve'], $_POST['eleve_for_del_eleve'], $_POST['confirm_del_eleve'])) {
	return delEleveForAdmin ($_POST['eleve_for_del_eleve']);
}

if (isset($_POST['nom_prof'], $_POST['prenom_prof'], $_POST['matiere_prof'])) {
  return addProfForAdmin (strtolower($_POST['nom_prof']), strtolower($_POST['prenom_prof']), strtolower($_POST['matiere_prof']));
}

if (isset ($_POST['prof_selected'], $_POST['matiere_prof'])) {
	return modifyProfForAdmin (strtolower($_POST['prof_selected']), strtolower($_POST['matiere_prof']));
}

if (isset ($_POST['prof_for_del'], $_POST['del_prof'])) {
	return delProfForAdmin ($_POST['prof_for_del']);
}



include ('../view/v_admin.php');
?>
