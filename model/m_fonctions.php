<?php
include ('forMySQL.php');

function verifUserIfExist($users){
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT id, identifiant, nom_eleve, prenom_eleve FROM eleves');
	while ($donnees = $reponse->fetch())
	{
		if ($users == $donnees['identifiant']) {
			$_SESSION['stats'] = 'eleve';
			$_SESSION['prenom'] = $donnees['prenom_eleve'];
			$_SESSION['nom'] = $donnees['nom_eleve'];
			return $donnees['id'];
		}
		$reponse2 = $bdd->query('SELECT id, identifiant, nom, prenom FROM professeurs');
		$donnees = $reponse2->fetch();
		if ($users == $donnees['identifiant']) {
			$_SESSION['stats'] = 'prof';
			$_SESSION['prenom'] = $donnees['prenom'];
			$_SESSION['nom'] = $donnees['nom'];
			return $donnees['id'];
		}
		$reponse2 = $bdd->query('SELECT id, identifiant, nom, prenom FROM vie_scolaire');
		$donnees = $reponse2->fetch();
		if ($users == $donnees['identifiant']) {
			$_SESSION['stats'] = 'viescolaire';
			$_SESSION['prenom'] = $donnees['prenom'];
			$_SESSION['nom'] = $donnees['nom'];
			return $donnees['id'];
		}
	}
	echo 'Cette utilisateur na pas été trouvé!';
}

function verifPassIsUser($user, $pass) {
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
		return header('Location: ../controller/c_eleve.php');
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
		return header('Location: ../controller/c_prof.php');
	}
	else if ($_SESSION['stats'] == 'viescolaire') {
		$reponse = $bdd->query('SELECT mot_de_passe FROM vie_scolaire WHERE id='.$id.'');
		$donnees = $reponse->fetch();
		if ($pass != $donnees['mot_de_passe']) {
			exit ('Mot de passe incorrect!');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		return header('Location: ../controller/c_viescolaire.php');
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
	$texte = '';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['classe'] == $classe) {

			$texte .= '<form class="form-inline">
				<div class="form-group">
					<label class="sr-only" for="NoteScolaire">Note sur </label>
					<div class="input-group">
						<div class="input-group-addon">'.ucfirst($donnees['prenom_eleve']).' '.strtoupper($donnees['nom_eleve']).'</div>
						<input type="text" class="form-control" id="NoteScolaire" placeholder="Entrer la note de l\'eleve">
						<div class="input-group-addon">20</div>
					</div>
				</div>
			</form>';
		}
	}
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

if (isset($_POST['eleve_appreciation'])) {
  return $_SESSION['eleve_appreciation'] = $_POST['eleve_appreciation'];
}

if (isset($_SESSION['eleve_appreciation'], $_POST['appreciation'])) {
	echo envoyerAppreciationEleve ($_POST['eleve_appreciation'], $_POST['appreciation']);
}

function envoyerAppreciationEleve ($eleve, $apreciation) {
	$bdd = connectionDB();
	$reponse = $bdd->query("UPDATE `eleves` SET `appreciation_eleve`= '$apreciation' WHERE id=3");
	if ($reponse == FALSE){
		return ('La mise à jour de l\'appreciation de l\'eleve n\'as pas pus être effectuer!');
	}
	return header('Location: ../controller/c_prof.php');
}
?>
