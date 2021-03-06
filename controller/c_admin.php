<?php
session_start();

require ('../model/m_fonctions.php');

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

if($_SESSION['niveau_admin'] < 1){
	return header('Location:viescolaire');
}

if (isset($_POST['nom_eleve'], $_POST['prenom_eleve'], $_POST['classe_eleve'], $_POST['nom_parent'], $_POST['prenom_parent'], $_POST['adresse_parent'], $_POST['email_parent'], $_POST['tel_parent'])) {
  return addAndModifyEleveForAdmin (strtolower($_POST['nom_eleve']), strtolower($_POST['prenom_eleve']), strtolower($_POST['classe_eleve']), strtolower($_POST['nom_parent']), strtolower($_POST['prenom_parent']), strtolower($_POST['adresse_parent']), strtolower($_POST['email_parent']), strtolower($_POST['tel_parent']));
}

if (isset ($_POST['classe_for_del_eleve'], $_POST['eleve_for_del_eleve'], $_POST['confirm_del_eleve'])) {
	return delEleveForAdmin ($_POST['eleve_for_del_eleve']);
}

if (isset($_POST['nom_prof'], $_POST['prenom_prof'], $_POST['matiere_1_prof'], $_POST['matiere_2_prof'], $_POST['matiere_3_prof'], $_POST['tel_prof'], $_POST['adresse_prof'], $_POST['email_prof'])) {
  return addProfForAdmin (strtolower($_POST['nom_prof']), strtolower($_POST['prenom_prof']), strtolower($_POST['matiere_1_prof']), strtolower($_POST['matiere_2_prof']), strtolower($_POST['matiere_3_prof']), strtolower($_POST['tel_prof']), strtolower($_POST['adresse_prof']), strtolower($_POST['email_prof']));
}

if (isset ($_POST['prof_selected'], $_POST['matiere_1_prof'], $_POST['matiere_2_prof'], $_POST['matiere_3_prof'], $_POST['tel_prof'], $_POST['adresse_prof'], $_POST['email_prof'])) {
	return modifyProfForAdmin (strtolower($_POST['prof_selected']), strtolower($_POST['matiere_1_prof']),strtolower($_POST['matiere_2_prof']), strtolower($_POST['matiere_3_prof']), strtolower($_POST['tel_prof']), strtolower($_POST['adresse_prof']), strtolower($_POST['email_prof']));
}

if (isset ($_POST['prof_for_del'], $_POST['del_prof'])) {
	return delProfForAdmin (strtolower($_POST['prof_for_del']));
}

if (isset ($_POST['nom_member'], $_POST['prenom_member'], $_POST['niveau_d_admin'], $_POST['adresse_member'], $_POST['email_member'], $_POST['tel_member'])) {
	return addMemberForAdmin (strtolower($_POST['nom_member']), strtolower($_POST['prenom_member']), strtolower($_POST['niveau_d_admin']), strtolower($_POST['adresse_member']), strtolower($_POST['email_member']), strtolower($_POST['tel_member']));
}

if (isset ($_POST['list_member_for_modify'], $_POST['niveau_d_admin_for_modify'])) {
	return modifyMemberForAdmin (strtolower($_POST['list_member_for_modify']), strtolower($_POST['niveau_d_admin_for_modify']), strtolower($_POST['adresse_member']), strtolower($_POST['email_member']), strtolower($_POST['tel_member']));
}

if (isset ($_POST['list_member_for_del'], $_POST['confim_del_member'])) {
	return delMemberForAdmin (strtolower($_POST['list_member_for_del']));
}

if (isset ($_POST['nom_classe'])) {
	return addClasseForAdmin (strtolower($_POST['nom_classe']));
}

if (isset ($_POST['classe_select_for_del'], $_POST['del_classe'])) {
	return delClasseForAdmin (strtolower($_POST['classe_select_for_del']));
}

if (isset ($_GET['es']))
{
	echo errorOrSuccesOnSite ($_GET['es']);
}

require ('../view/v_admin.php');
?>
