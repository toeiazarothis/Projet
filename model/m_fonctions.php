<?php
include ('forMySQL.php');

//condition pour verifier sur nous devons lancer la fonctions ou pas
// partie page index debu
// cette parti permet de verifier si l'utilisateur existe dans la BDD
function verifUserIfExist ($user){
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT id, identifiant, nom_eleve, prenom_eleve FROM eleves');
	while ($donnees = $reponse->fetch())
	{
		if ($user == $donnees['identifiant']) {
			$_SESSION['stats'] = 'eleve';
			$_SESSION['prenom'] = $donnees['prenom_eleve'];
			$_SESSION['nom'] = $donnees['nom_eleve'];
			return $donnees['id'];
		}
	}
	$reponse = $bdd->query('SELECT id, identifiant, nom, prenom FROM professeurs');
	while ($donnees = $reponse->fetch())
	{
		if ($user == $donnees['identifiant']) {
			$_SESSION['stats'] = 'prof';
			$_SESSION['prenom'] = $donnees['prenom'];
			$_SESSION['nom'] = $donnees['nom'];
			return $donnees['id'];
		}
	}
	$reponse = $bdd->query('SELECT id, identifiant FROM vie_scolaire');
	$donnees = $reponse->fetch();
	while ($donnees = $reponse->fetch())
	{
		if ($user == $donnees['identifiant']) {
			$_SESSION['stats'] = 'viescolaire';
			return $donnees['id'];
		}
	}
	echo 'Cet utilisateur n a pas été trouvé!';
}
// fin de la parti verification de l'utilisateur
// debut de la parti si le mot de passe de l'utilisateur est coreect
function verifPassIsUser ($user, $pass) {
	$bdd = connectionDB();
	$id = verifUserIfExist($user);
	if ($_SESSION['stats'] == 'eleve') {
		$reponse = $bdd->query('SELECT mot_de_passe, classe FROM eleves WHERE id='.$id.'');
		$donnees = $reponse->fetch();
		if ($pass != $donnees['mot_de_passe']) {
			exit ('Mot de passe incorrect!');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		$_SESSION['classe'] = $donnees['classe'];
		return header('Location:eleve');
	}
	else if ($_SESSION['stats'] == 'prof') {
		$reponse = $bdd->query('SELECT mot_de_passe, matiere FROM professeurs WHERE id='.$id.'');
		$donnees = $reponse->fetch();
		if ($pass != $donnees['mot_de_passe']) {
			exit ('Mot de passe incorrect!');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		$_SESSION['p_matiere'] = $donnees['matiere'];
		return header('Location:prof');
	}
	else if ($_SESSION['stats'] == 'viescolaire') {
		$reponse = $bdd->query('SELECT mot_de_passe FROM vie_scolaire WHERE id='.$id.'');
		$donnees = $reponse->fetch();
		if ($pass != $donnees['mot_de_passe']) {
			exit ('Mot de passe incorrect!');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		return header('Location:viescolaire');
	}
}
// fin de la parti sur le mot de passe de l'utilisateur
// fin de la parti de la page dindex


// debut de la partie eleve
// pour l'affichage des note dans la parti eleve
function matiereForEleve ($userID, $matiere) {
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT eleve, note, matiere FROM notes ORDER BY id DESC');
	$texte = '';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['eleve'] == $userID && $donnees['matiere'] == $matiere) {
			$texte .= $donnees['note'].'/20<br>';
		}
	}
	return $texte;
}
// fin de la parti d'affichage des note
// debut de la parti permettant d'afficher les devoir et les cours dans la parti eleve
function devoirForEleve ($userID, $classe, $matiere) {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT matiere, contenu, devoir FROM cours_devoirs WHERE classe='$classe' ORDER BY id DESC");
	$texte = '';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['matiere'] == $matiere) {
			$texte .= '<h3>Résumé du cours</h3><p>'.$donnees['contenu'].'</p>';
			$texte .= '<h3>Les devoirs</h3><p>'.$donnees['devoir'].'</p>';
		}
	}
	return $texte;
}
// fin de la parti permmetrant dafficher les devoir et les cours d'un eleve
// debut de la parti permettant d'afficher l'appreciation de l'eleve
function appreciationForEleve ($userID) {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, appreciation_eleve FROM eleves WHERE id=$userID");
	$donnees = $reponse->fetch();
	return $donnees['appreciation_eleve'];
}
// fin de la parti permettant d'afficher l'appreciation de l'eleve
// fin de la parti eleve


// debut de la parti prof
// debut parti permettant d'afficher la liste des classe dans la BDDD
//condition pour verifier sur nous devons lancer la fonctions ou pas
if (isset($_POST['matiere_for_note'])) {
  echo afficherListeClasseForProf ();
}

function afficherListeClasseForProf () {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, nom FROM classe");
	$texte = '<option value="par_default">Selectionner une classe</option>';
	while ($donnees = $reponse->fetch())
	{
		$texte .= '<option value="'.$donnees['nom'].'">'.$donnees['nom'].'</option>';
	}
	return $texte;
}
// fin de la parti permettant d'afficher les classe
//debut de la parti pour lajout de note (a refaire)
//condition pour verifier sur nous devons lancer la fonctions ou pas
if (isset($_POST['eleve_for_note'])) {
  echo afficherListeEleveForProf($_POST['eleve_for_note']);
}
// fonction permettant d'afficher les eleve a parti d'une classe
function afficherListeEleveForProf($classe) {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, classe, prenom_eleve, nom_eleve FROM eleves");
	$texte = '<option value="par_default">Selectionner un élève</option>';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['classe'] == $classe) {
			$texte .= '<option value="'.$donnees['id'].'">'.ucfirst($donnees['prenom_eleve']).' '.strtoupper($donnees['nom_eleve']).'</option>';
		}
	}
	return $texte;
}
//fin de la parti dajout de note

// debut de la parti pour ajouter une appreciation
//condition pour verifier sur nous devons lancer la fonctions ou pas
if (isset($_POST['classe_appreciation'])) {
  echo afficherListeEleveForAppreciationForProf($_POST['classe_appreciation']);
}
// fonction permettant de sauvegarder l'appreciation dans la BDD
function envoyerAppreciationEleveForProf ($eleve, $apreciation) {
	$bdd = connectionDB();
	$reponse = $bdd->query('UPDATE `eleves` SET `appreciation_eleve`= "'.$apreciation.'" WHERE id='.$eleve.'');
	if ($reponse == FALSE){
		return ('La mise à jour de l\'appreciation de l\'eleve n\'as pas pus être effectuer!');
	}
	header('Location:prof');
}
//fin de la parti ajouter une appreciation
//fin de la parti prof
?>
