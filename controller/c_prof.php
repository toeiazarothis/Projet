<?php
session_start();

require ('../model/m_fonctions.php');

if(!isset($_SESSION['users'], $_SESSION['userid'])) {
	return header('Location:accueil');
}

if($_SESSION['stats'] != 'prof') {
	if($_SESSION['stats'] == 'eleve') {
		return header('Location:eleve');
	}
	if($_SESSION['stats'] == 'viescolaire') {
		return header('Location:viescolaire');
	}
	if($_SESSION['stats'] == 'parent') {
		return header('Location:parent');
	}
}

if (isset($_POST['validate_note'], $_POST['classe_for_note'])) {
	// $idEleve = prepareForSendAbsence ($_POST['classe_for_absent']);
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT MAX(id), classe FROM eleves WHERE classe="'.$_POST['classe_for_note'].'"');
	$donnees = $reponse->fetch();
	$idEleve = $donnees['MAX(id)'];
	$id = 0;
	while ($id <= $idEleve) {
		if ($_POST["$id"] >= 1){
			echo sendNoteForProf ($id, $_POST['matiere_for_note'], $_POST['classe_for_note'], $_POST["$id"]);
		}
		$id += 1;
		if ($id > $idEleve) {
			return header('Location:prof');
		}
	}
}

if (isset($_POST['matiere_for_cours_devoir'], $_POST['classe_for_cours_devoir'], $_POST['cours_for_cours_devoir'], $_POST['devoir_for_cours_devoir'])) {
	echo sendCoursAndDevoirForProf ($_POST['matiere_for_cours_devoir'], $_POST['classe_for_cours_devoir'], $_POST['cours_for_cours_devoir'], $_POST['devoir_for_cours_devoir']);
}

if (isset($_POST['eleve_appreciation'], $_POST['appreciation'])) {
	echo envoyerAppreciationEleveForProf ($_POST['eleve_appreciation'], $_POST['appreciation']);
}

if (isset($_POST['validate_abs'], $_POST['classe_for_absent'])) {
	// $idEleve = prepareForSendAbsence ($_POST['classe_for_absent']);
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT MAX(id), classe FROM eleves WHERE classe="'.$_POST['classe_for_absent'].'"');
	$donnees = $reponse->fetch();
	$idEleve = $donnees['MAX(id)'];
	$id = 0;
	while ($id <= $idEleve) {
		if (isset($_POST["$id"])){
			echo sendAbsenceEleveForProf ($id);
		}
		$id += 1;
		if ($id > $idEleve) {
			return header('Location:prof');
		}
	}
}

if (isset ($_GET['es']))
{
	echo errorOrSuccesOnSite ($_GET['es']);
}

require ('../view/v_prof.php');
?>
