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
	$reponse = $bdd->query('SELECT id, identifiant, nom, prenom FROM vie_scolaire');
	while ($donnees = $reponse->fetch())
	{
		if ($user == $donnees['identifiant']) {
			$_SESSION['stats'] = 'viescolaire';
			$_SESSION['prenom'] = $donnees['prenom'];
			$_SESSION['nom'] = $donnees['nom'];
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
			$texte .= $donnees['note'].'/20 ';
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
	$texte = '<option value="par_default">Sélectionner une classe</option>';
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
  echo afficherListeEleveDansClassePourNote($_POST['eleve_for_note']);
}
function afficherListeEleveDansClassePourNote ($classe) {
 	$bdd = connectionDB();
 	$reponse = $bdd->query("SELECT id, classe, prenom_eleve, nom_eleve FROM eleves");
 	$texte = '';
 	while ($donnees = $reponse->fetch())
 	{
 		if ($donnees['classe'] == $classe) {
 			$texte .= '<div class="form-group">
 					<div class="input-group">
 						<div class="input-group-addon">'.ucfirst($donnees['prenom_eleve']).' '.strtoupper($donnees['nom_eleve']).'</div>
 						<input type="number" class="form-control" id="NoteScolaire" name="'.$donnees['id'].'" step="0.5" value="" min="0" max="20" placeholder="Entrer la note de l\'eleve">
 						<div class="input-group-addon">20</div>
 					</div>
 				</div>';
 		}
 	}
 	return $texte;
}

// fonction permettant d'envoyer la note dans la colonne note de la table Eleve de la BDD
function sendNoteForProf ($eleve, $matiere, $classe, $note) {
	$bdd = connectionDB();
	$reponse = $bdd->exec('INSERT INTO `notes` (`eleve`, `matiere`, `classe`, `note`) VALUES ('.$eleve.', "'.$matiere.'", "'.$classe.'", '.$note.')');
	if ($reponse == FALSE){
		echo ('La note n\'as pas pus être ajouter!');
	}
	echo 'La note a bien été envoyer dans la BDD';
}
//fin de la parti dajout de note

// debut de la parti pour ajouter les cours et devoir
// function permettant d'envoyer les cours et devoir dans la BDD
function sendCoursAndDevoirForProf ($matiere, $classe, $cours, $devoir){
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT `id`, `matiere`, `classe`, `contenu`, `devoir` FROM `cours_devoirs` WHERE classe="'.$classe.'"');
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['matiere'] == $matiere) {
			$reponse2 = $bdd->exec('UPDATE `cours_devoirs` SET `contenu`="'.$cours.'",`devoir`="'.$devoir.'" WHERE id='.$donnees['id'].'');
			if ($reponse2 == FALSE){
				echo ('Les devoirs n\'ont pas pus être ajouter!');
			}
			return header('Location:prof');
		}
	}
	$reponse = $bdd->exec('INSERT INTO `cours_devoirs`(`matiere`, `classe`, `contenu`, `devoir`) VALUES ("'.$matiere.'", "'.$classe.'", "'.$cours.'", "'.$devoir.'")');
	if ($reponse == FALSE){
		echo ('Les devoirs n\'ont pas pus être ajouter!');
	}
	header('Location:prof');
}
// fin de la parti pour ajouter les cours et devoir

// debut de la parti pour faire les absence
// condition permettant de verfi si la function doit se lancer
if (isset($_POST['eleve_for_absence'])) {
	echo showListEleveForAbsence ($_POST['eleve_for_absence']);
}
// fonction pour afficher la liste des eleve en fonction de la classe.
function showListEleveForAbsence ($classe) {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT id, classe, prenom_eleve, nom_eleve FROM eleves");
	$texte = '<h4>Liste des élèves:</h4>';
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['classe'] == $classe) {
			$texte .= '<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox1" name="'.$donnees['id'].'" value="yes">'.ucfirst($donnees['prenom_eleve']).' '.strtoupper($donnees['nom_eleve']).'
			</label>';
		}
	}
	return $texte;
}
// fonction permettant de preparer l'envoye des absences
function prepareForSendAbsence ($classe) {
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT MAX(id), classe FROM eleves WHERE classe="'.$_POST['classe_for_absent'].'"');
	$idEleve = 0;
	while ($donnees = $reponse->fetch())
	{
		if ($donnees['classe'] == $classe) {
			$idEleve = $donnees['MAX(id)'];
		}
	}
	return $idEleve;
}
// fonction permmettant d'envoyer l'absence dans la BDD
function sendAbsenceEleveForProf ($idEleve) {
	$bdd = connectionDB();
	$reponse = $bdd->exec('INSERT INTO `absence`(`id_prof`, `id_eleve`, `date_debut`, `date_fin`, `motif`) VALUES (0, '.$idEleve.', "'.date('y-m-d').'", "'.date('y-m-d').'", "NO-CONFIG")');
	if ($reponse == FALSE){
		echo ('Les absences n\'ont pas pus être ajouter!');
	}
}
// fin de la parti absence

// debut de la parti pour ajouter une appreciation
//condition pour verifier sur nous devons lancer la fonctions ou pas
if (isset($_POST['classe_appreciation'])) {
  echo afficherListeEleveForProf($_POST['classe_appreciation']);
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
// fonction permettant de sauvegarder l'appreciation dans la BDD
function envoyerAppreciationEleveForProf ($eleve, $apreciation) {
	$bdd = connectionDB();
	$reponse = $bdd->exec('UPDATE `eleves` SET `appreciation_eleve`= "'.$apreciation.'" WHERE id='.$eleve.'');
	if ($reponse == FALSE){
		return ('La mise à jour de l\'appreciation de l\'eleve n\'as pas pus être effectuer!');
	}
	header('Location:prof');
}
//fin de la parti ajouter une appreciation
//fin de la parti prof

// debut de la parti page administration
// fonction permettant de généré un identifiant
function genereUsernameForAdmin ($nom, $prenom) {
	$prenom1 = substr($prenom,0,1);
	$prenom2 = $nom.'_'.$prenom1;
	return $prenom2;
}
// fonction permettant de générer un mot de passe
function generePasswordForAdmin($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++) {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}

// fonction permettant d'ajouter un eleve
function addEleveForAdmin($nom, $prenom, $classe, $nom_parent, $prenom_parent, $adresse_parent, $email_parent, $tel_parent) {
	$bdd = connectionDB();

  $identifiant = genereUsernameForAdmin($nom, $prenom);
  $mdp = generePasswordForAdmin(6);

	$reponse = $bdd->exec("INSERT INTO `eleves`(`nom_eleve`, `prenom_eleve`, `classe`, `identifiant`, `mot_de_passe`, `nom_parent`, `prenom_parent`, `adresse_parent`, `email_parent`, `tel_parent`, `appreciation_eleve`)
	VALUES ('$nom', '$prenom', '$classe', '$identifiant', '$mdp', '$nom_parent', '$prenom_parent', '$adresse_parent', '$email_parent', '$tel_parent', 'Aucune appréciation.')");

	return header('Location:admin');
}
// fonction pour afficher la liste des classes
function showListAllClassForAdmin () {
	$bdd = connectionDB();
	$reponse = $bdd->query("SELECT nom FROM classe");
	$texte = '<option value="par_default">Selectionner une classe</option>';
	while ($donnees = $reponse->fetch())
	{
		$texte .= '<option value="'.$donnees['nom'].'">'.$donnees['nom'].'</option>';
	}
	return $texte;
}
// condition pour verifier si on lance la fonction showListEleveForAdmin
if (isset($_POST['list_eleve_for_maj'])) {
	echo showListEleveForAdmin ($_POST['list_eleve_for_maj']);
}
// condition pour verifier si on lance la fonction showListEleveForAdmin
if (isset($_POST['list_eleve_for_del'])) {
	echo showListEleveForAdmin ($_POST['list_eleve_for_del']);
}
// fonction pour afficher la liste des eleves
function showListEleveForAdmin ($classe) {
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
// condition permettant de lancer la fonction showFormulaireForMajEleveForAdmin
if (isset ($_POST['formulaire_eleve_for_maj'])) {
	echo showFormulaireForMajEleveForAdmin ($_POST['formulaire_eleve_for_maj']);
}
// fonction permettant d'afficher le formulaire pour la MAJ eleve
function showFormulaireForMajEleveForAdmin ($eleve) {
	$texte = '<form action="admin" method="post">
		<div class="form-group">
			<label class="sr-only" for="nomDeFamille">Nom de famille de l\'élève</label>
				<div class="input-group">
					<div class="input-group-addon">Nom de famille</div>
					<input type="text" name="nom_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer un nom">
				</div>
				<label class="sr-only" for="exampleInputAmount">Prenom de l\'élève</label>
				<div class="input-group">
					<div class="input-group-addon">Prenom</div>
					<input type="text" name="prenom_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer un prenom">
				</div>
				<label class="sr-only" for="exampleInputAmount">Classe de l\'élève</label>
				<div class="input-group">
					<div class="input-group-addon">Classe</div>
					<input type="text" name="classe_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer la classe de l\'élève">
				</div>
				<label class="sr-only" for="exampleInputAmount">Nom d\'un parent</label>
				<div class="input-group">
					<div class="input-group-addon">Nom d\'un parent</div>
					<input type="text" name="nom_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le nom d\'un parent">
				</div>
				<label class="sr-only" for="exampleInputAmount">Prenom du parent</label>
				<div class="input-group">
					<div class="input-group-addon">Prenom du parent</div>
					<input type="text" name="prenom_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le prenom du parent">
				</div>
				<label class="sr-only" for="exampleInputAmount">Adresse du domicile</label>
				<div class="input-group">
					<div class="input-group-addon">Adresse</div>
					<input type="text" name="adresse_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer l\'adresse postale">
				</div>
				<label class="sr-only" for="exampleInputAmount">E-mail</label>
				<div class="input-group">
					<div class="input-group-addon">Courriel du parent</div>
					<input type="email" name="email_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer l\'adresse courriel du parent">
				</div>
				<label class="sr-only" for="exampleInputAmount">Numero de telephone</label>
				<div class="input-group">
					<div class="input-group-addon">Numero de telephone</div>
					<input type="tel" name="tel_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le numero de telephone du parent">
				</div><br>
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<button class="btn btn-success">Modifier l\'élève</button>
					</div>
						<!-- <input class="btn btn-warning" type="button" value="Effacer"> -->
				</div>
		</div>
	</form>';
	return $texte;
}
// fin de la parti page administration
?>
