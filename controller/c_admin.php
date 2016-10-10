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
  return AddEleveForAdmin (strtolower($_POST['nom_eleve']), strtolower($_POST['prenom_eleve']), strtolower($_POST['classe_eleve']), strtolower($_POST['nom_parent']), strtolower($_POST['prenom_parent']), strtolower($_POST['adresse_parent']), strtolower($_POST['email_parent']), strtolower($_POST['tel_parent']));
}

// Fait C/C par PATRICK
if (isset($_POST['matiere'], $_POST['classe'], $_POST['nom'], $_POST['prenom'], $_POST['adresse_professeur'], $_POST['email_professeur'], $_POST['tel_professeur'])) {
  return AddProfForAdmin (strtolower($_POST['matiere']), strtolower($_POST['classe']), strtolower($_POST['nom']), strtolower($_POST['prenom']), strtolower($_POST['adresse_professeur']), strtolower($_POST['email_professeur']), strtolower($_POST['tel_professeur']));
}

if (isset($_POST['nom_eleve'], $_POST['prenom_eleve'], $_POST['classe_eleve'], $_POST['nom_parent'], $_POST['prenom_parent'], $_POST['adresse_parent'], $_POST['email_parent'], $_POST['tel_parent'])) {
  return AddVieScolaireForAdmin (strtolower($_POST['nom_eleve']), strtolower($_POST['prenom_eleve']), strtolower($_POST['classe_eleve']), strtolower($_POST['nom_parent']), strtolower($_POST['prenom_parent']), strtolower($_POST['adresse_parent']), strtolower($_POST['email_parent']), strtolower($_POST['tel_parent']));
}

if (isset($_POST['nom'])) {
  return AddClasseForAdmin (strtolower($_POST['nom']));
}

//
include ('../view/v_admin.php');
?>
