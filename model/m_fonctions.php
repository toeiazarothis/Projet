<?php
include ('forMySQL.php');

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

function matiere ($userID, $matiere) {
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

function devoir ($userID, $classe, $matiere) {
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

function afficherListeClasse () {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, nom FROM classe");
	$texte = '';
	while ($donnees = $reponse->fetch())
	{
		$texte .= '<option value="'.$donnees['nom'].'">'.$donnees['nom'].'</option>';
	}
	return $texte;
}

if (isset($_POST['classe_note'])) {
  echo afficherListeEleveDansClassePourNote($_POST['classe_note']);
}

function afficherListeEleveDansClassePourNote ($classe) {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, classe, prenom_eleve, nom_eleve FROM eleves");
	$texte = '<form class="form-inline" action="prof">';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['classe'] == $classe) {

			$texte .= '<div class="form-group">
					<label class="sr-only" for="NoteScolaire">Note sur </label>
					<div class="input-group">
						<div class="input-group-addon">'.ucfirst($donnees['prenom_eleve']).' '.strtoupper($donnees['nom_eleve']).'</div>
						<input type="number" step="0,5" value="0" min="0" max="20" name="'.$donnees['id'].'" class="form-control" id="NoteScolaire" placeholder="Entrer la note de l\'eleve">
						<div class="input-group-addon">20</div>
					</div>
				</div>';
		}
	}
	$texte .= '
	<br><br>
	<button class="btn btn-success">Ajouter les notes</button>
	</form>';
	return $texte;
}

if (isset($_POST['classe_appreciation'])) {
  echo afficherListeEleveDansClassePourAppreciation($_POST['classe_appreciation']);
}

function afficherListeEleveDansClassePourAppreciation ($classe) {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, classe, prenom_eleve, nom_eleve FROM eleves");
	$texte = '';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['classe'] == $classe) {
			$texte .= '<option value="'.$donnees['id'].'">'.ucfirst($donnees['prenom_eleve']).' '.strtoupper($donnees['nom_eleve']).'</option>';
		}
	}
	return $texte;
}

function envoyerAppreciationEleve ($eleve, $apreciation) {
	$bdd = connectionDB();
	$reponse = $bdd->query('UPDATE `eleves` SET `appreciation_eleve`= "'.$apreciation.'" WHERE id='.$eleve.'');
	if ($reponse == FALSE){
		return ('La mise à jour de l\'appreciation de l\'eleve n\'as pas pus être effectuer!');
	}
	header('Location:prof');
}
?>
