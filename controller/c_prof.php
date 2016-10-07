<?php
session_start();

include ('../model/m_fonctions.php');

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

if (isset($_POST['matiere_for_cours_devoir'], $_POST['classe_for_cours_devoir'], $_POST['cours_for_cours_devoir'], $_POST['devoir_for_cours_devoir'])) {
	echo sendCoursAndDevoirForProf ($_POST['matiere_for_cours_devoir'], $_POST['classe_for_cours_devoir'], $_POST['cours_for_cours_devoir'], $_POST['devoir_for_cours_devoir']);
}

if (isset($_POST['eleve_appreciation'], $_POST['appreciation'])) {
	echo envoyerAppreciationEleveForProf ($_POST['eleve_appreciation'], $_POST['appreciation']);
}

echo $_POST['validate_abs'].'<br>';
echo $_POST['classe_for_absent'].'<br>';

if (isset($_POST['validate_abs'], $_POST['classe_for_absent'])) {
	$idEleve = prepareForSendAbsence ($_POST['classe_for_absent']);
	while ($id >= $idEleve) {
		// if (isset($_POST["id_$id"])){
		// 	echo sendAbsenceEleveForProf ($id);
		// }
		echo $_POST[$id].'<br>';
		$id += 1;
	}
	return header('Location:prof');
}

include ('../view/v_prof.php');
?>
