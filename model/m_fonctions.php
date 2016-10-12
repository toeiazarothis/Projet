<?php
include ('forMySQL.php');

// parti pour erreur site
function errorOrSuccesOnSite($errorOrSucces) {
	$texte = '';
	if($errorOrSucces == 1){//utilisateur inexistant
		$texte .= '<div class="alert alert-danger" id="error" style="position:fixed; width:100%">Cette utilisateur est inexistant!</div>';
	}
	if($errorOrSucces == 2){//mot de passe incorrect
		$texte .= '<div class="alert alert-warning" id="error" style="position:fixed; width:100%">Vous avez saisie un mauvais mot de passe!</div>';
	}
	if($errorOrSucces == 3){//note ajouter
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Vous avez ajouter la note avec succès!</div>';
	}
	if($errorOrSucces == 4){//cours & devoir mise a jour
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Devoir & Note mis à jour pour cette classe</div>';
	}
	if($errorOrSucces == 5){//absence effectuer
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Les absences sont été éffectuer</div>';
	}
	if($errorOrSucces == 6){//appreciation mise a jour
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Apréciation mis à jour avec succès</div>';
	}
	if($errorOrSucces == 7){//ajout eleve
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Cette élève à bien été ajouter a la base de donnée</div>';
	}
	if($errorOrSucces == 8){//mise a jour eleve
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Les données de cette élève ont bien été mis à jour</div>';
	}
	if($errorOrSucces == 9){//suppression eleve
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Cette élève vient d\'être retirer de la base de donnée</div>';
	}
	if($errorOrSucces == 10){//ajout prof
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Ce professeur a bien été ajouter à la base de donnée</div>';
	}
	if($errorOrSucces == 11){//mise a jour prof
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Les données de ce professeur ont bien été mis à jour</div>';
	}
	if($errorOrSucces == 12){//suppression prof
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Ce professeur a été retirer de la base de donnée/div>';
	}
	if($errorOrSucces == 13){//ajout personnel
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Ce membre du personnel a bien été ajouter à la base de donnée</div>';
	}
	if($errorOrSucces == 14){//mise a jour personnel
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Les données de ce membre du personnel ont bien été mis à jour</div>';
	}
	if($errorOrSucces == 15){//suppression personnel
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Ce membre du personnel a été retirer de la base de donnée/div>';
	}
	if($errorOrSucces == 16){//ajout classe
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Cette classe a bien été ajouter à la base de donnée</div>';
	}
	if($errorOrSucces == 17){//mise a jour classe
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Les données de cette classe ont bien été mis à jour</div>';
	}
	if($errorOrSucces == 18){//suppression classe
		$texte .= '<div class="alert alert-success" style="position:fixed; width:100%">Cette classe a été retirer de la base de donnée/div>';
	}
	if($errorOrSucces == 19) { //erreur ajout classe
		$texte.= '<div class="alert alert-danger" style="position:fixed; width:100%">Cette classe existe déjà</div>';
	}
	return $texte;
}

// debut de  la partie page index
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
	return header('Location:accueil?error=1');
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
			return header('Location:accueil?error=2');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		$_SESSION['classe'] = $donnees['classe'];
		$_SESSION['moyenneGeneral'] = '';
		$_SESSION['nbNoteMoyenneGeneral'] = '';
		return header('Location:eleve');
	}
	else if ($_SESSION['stats'] == 'prof') {
		$reponse = $bdd->query('SELECT mot_de_passe, matiere1, matiere2, matiere3 FROM professeurs WHERE id='.$id.'');
		$donnees = $reponse->fetch();
		if ($pass != $donnees['mot_de_passe']) {
			return header('Location:accueil?error=2');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		$_SESSION['p_matiere_1'] = $donnees['matiere1'];
		$_SESSION['p_matiere_2'] = $donnees['matiere2'];
		$_SESSION['p_matiere_3'] = $donnees['matiere3'];
		return header('Location:prof');
	}
	else if ($_SESSION['stats'] == 'viescolaire') {
		$reponse = $bdd->query('SELECT mot_de_passe, niveau_admin FROM vie_scolaire WHERE id='.$id.'');
		$donnees = $reponse->fetch();
		if ($pass != $donnees['mot_de_passe']) {
			return header('Location:accueil?error=2');
		}
		$_SESSION['users'] = $user;
		$_SESSION['userid'] = $id;
		$_SESSION['niveau_admin'] = $donnees['niveau_admin'];
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
// fonction pour afficher la moyenne de lamatiere X
function moyenneForMatiereForEleve ($userID, $matiere) {
	$bdd = connectionDB();

	$reponse = $bdd->query('SELECT eleve, note, matiere FROM notes ORDER BY id DESC');

	$nbNote = 0;

	$additionNote = 0;

	while ($donnees = $reponse->fetch())
	{
		if ($donnees['eleve'] == $userID && $donnees['matiere'] == $matiere) {
			$additionNote += $donnees['note'];
			$nbNote += 1;
		}
	}

	if ($additionNote > 1) {
		$moyenneGeneral = $additionNote / $nbNote;
		$_SESSION['moyenneGeneral'] += $moyenneGeneral;
		$_SESSION['nbNoteMoyenneGeneral'] += 1;
		return $moyenneGeneral;
	}
}
// fonction pour afficher la moyenne general
function moyenneForEleve () {
	if (isset ($_SESSION['moyenneGeneral'], $_SESSION['nbNoteMoyenneGeneral'])) {
		$moyenneGeneral = $_SESSION['moyenneGeneral'] / $_SESSION['nbNoteMoyenneGeneral'];
	}

	return $moyenneGeneral;
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

	$texte = '<option value="">Sélectionner une classe</option>';

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
			header('Location:prof');
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

	$texte = '<option value="">Selectionner un élève</option>';

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
function generePasswordForAdmin($nb_car, $chaine = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
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

// fonction permettant d'ajouter ou modifier un eleve
function addAndModifyEleveForAdmin($nom, $prenom, $classe, $nom_parent, $prenom_parent, $adresse_parent, $email_parent, $tel_parent) {
	$bdd = connectionDB();

  $identifiant = genereUsernameForAdmin($nom, $prenom);
  $mdp = generePasswordForAdmin(6);

	$reponse = $bdd->query("SELECT id, nom_eleve, prenom_eleve FROM eleves");

	while ($donnees = $reponse->fetch()) {
		if ($donnees['nom_eleve'] == $nom && $donnees['prenom_eleve'] == $prenom) {
			$reponse = $bdd->exec('UPDATE `eleves` SET `classe`="'.$classe.'",`nom_parent`="'.$nom_parent.'",`prenom_parent`="'.$prenom_parent.'",`adresse_parent`="'.$adresse_parent.'",`email_parent`="'.$email_parent.'",`tel_parent`="'.$tel_parent.'"
			WHERE `id`='.$donnees['id'].'');

			if ($reponse == FALSE){
				return ('La mise à jour de l\'élève n\'as pas pus être effectuer!');
			}

			header('Location:admin');
		}
	}

	$reponse = $bdd->exec("INSERT INTO `eleves`(`nom_eleve`, `prenom_eleve`, `classe`, `identifiant`, `mot_de_passe`, `nom_parent`, `prenom_parent`, `adresse_parent`, `email_parent`, `tel_parent`, `appreciation_eleve`)
	VALUES ('$nom', '$prenom', '$classe', '$identifiant', '$mdp', '$nom_parent', '$prenom_parent', '$adresse_parent', '$email_parent', '$tel_parent', 'Aucune appréciation.')");

	if ($reponse == FALSE){
		return ('L\'ajout de l\'élève n\'as pas pus être effectuer!');
	}

	header('Location:admin');
}
// fonction pour afficher la liste des classes
function showListAllClassForAdmin () {
	$bdd = connectionDB();

	$reponse = $bdd->query("SELECT nom FROM classe");

	$texte = '<option value="">Selectionner une classe</option>';

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

	$texte = '<option value="">Selectionner un élève</option>';

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
	$bdd = connectionDB ();

	$reponse = $bdd->query("SELECT id, classe, prenom_eleve, nom_eleve, nom_parent, prenom_parent, adresse_parent, email_parent, tel_parent FROM eleves WHERE id=$eleve");

	$donnees = $reponse->fetch();

	$texte = '<form action="admin" method="post">
		<div class="form-group">
		<fieldset disabled>
		<label class="sr-only" for="exampleInputAmount">Nom de l\'élève</label>
		<div class="input-group">
			<div class="input-group-addon">Nom</div>
			<input type="text" name="classe_eleve" class="form-control" id="exampleInputAmount" value="'.$donnees['nom_eleve'].'">
		</div>
		<label class="sr-only" for="exampleInputAmount">Preno de l\'élève</label>
		<div class="input-group">
			<div class="input-group-addon">Prenom</div>
			<input type="text" name="classe_eleve" class="form-control" id="exampleInputAmount" value="'.$donnees['prenom_eleve'].'">
		</div>
		</fieldset>
			<label class="sr-only" for="exampleInputAmount">Classe de l\'élève</label>
			<div class="input-group">
				<div class="input-group-addon">Classe</div>
				<input type="text" name="classe_eleve" class="form-control" id="exampleInputAmount" value="'.$donnees['classe'].'">
			</div>
			<label class="sr-only" for="exampleInputAmount">Nom d\'un parent</label>
			<div class="input-group">
				<div class="input-group-addon">Nom d\'un parent</div>
				<input type="text" name="nom_parent" class="form-control" id="exampleInputAmount" value="'.$donnees['nom_parent'].'">
			</div>
			<label class="sr-only" for="exampleInputAmount">Prenom du parent</label>
			<div class="input-group">
				<div class="input-group-addon">Prenom du parent</div>
				<input type="text" name="prenom_parent" class="form-control" id="exampleInputAmount" value="'.$donnees['prenom_parent'].'">
			</div>
			<label class="sr-only" for="exampleInputAmount">Adresse du domicile</label>
			<div class="input-group">
				<div class="input-group-addon">Adresse</div>
				<input type="text" name="adresse_parent" class="form-control" id="exampleInputAmount" value="'.$donnees['adresse_parent'].'">
			</div>
			<label class="sr-only" for="exampleInputAmount">E-mail</label>
			<div class="input-group">
				<div class="input-group-addon">Courriel du parent</div>
				<input type="email" name="email_parent" class="form-control" id="exampleInputAmount" value="'.$donnees['email_parent'].'">
			</div>
			<label class="sr-only" for="exampleInputAmount">Numero de telephone</label>
			<div class="input-group">
				<div class="input-group-addon">Numero de telephone</div>
				<input type="tel" name="tel_parent" class="form-control" id="exampleInputAmount" value="'.$donnees['tel_parent'].'">
			</div><br>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<button class="btn btn-success">Modifier l\'élève</button>
				</div>
			</div>
		</div>
	</form>';
	return $texte;
}
// function permettant de supprimer un eleve
function delEleveForAdmin ($eleve) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `eleves` WHERE `id`=$eleve");

	if ($reponse == FALSE){
		return ('La suprresion de l\'élève n\'as pas pus être effectuer');
	}

	header('Location:admin');
}


// fonction permettant d'ajouter un prof
function addProfForAdmin($nom, $prenom, $matiere1, $matiere2, $matiere3, $tel, $adresse, $email) {
	$bdd = connectionDB();

  $identifiant = genereUsernameForAdmin($nom, $prenom);
  $mdp = generePasswordForAdmin(6);

	$reponse = $bdd->exec("INSERT INTO `professeurs`(`nom`, `prenom`, `identifiant`, `mot_de_passe`, `tel`, `adresse`, `email`, `matiere1`, `matiere2`, `matiere3`)
	VALUES
	('$nom', '$prenom', '$identifiant', '$mdp', '$tel', '$adresse', '$email', '$matiere1', '$matiere2', '$matiere3')");

	if ($reponse == FALSE){
		return ('L\'ajout du professeurs n\'as pas pus être effectuer!');
	}

	header('Location:admin');
}
// condition permettant de lancer la fonction showFormulaireProfForAdmin
if (isset ($_POST['formulaire_for_modify_prof'])) {
	echo showFormulaireProfForAdmin ($_POST['formulaire_for_modify_prof']);
}
// fonction permettant d'afficher des information d'un prof
function showFormulaireProfForAdmin ($prof) {
	$bdd = connectionDB ();

	$reponse = $bdd->query("SELECT id, adresse, email, tel FROM professeurs WHERE id=$prof");

	$donnees = $reponse->fetch();

	$texte = '<div class="input-group">
		<div class="input-group-addon">Téléphone</div>
		<input type="tel" class="form-control" name="tel_prof" id="exampleInputAmount" value="'.$donnees['tel'].'" required>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Adresse</div>
		<input type="text" class="form-control" name="adresse_prof" id="exampleInputAmount" value="'.$donnees['adresse'].'" required>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Email</div>
		<input type="text" class="form-control" name="email_prof" id="exampleInputAmount" value="'.$donnees['email'].'" required>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Matière n°1</div>
		<select class="form-control" name="matiere_1_prof" id="matiere_for_note">
			<option value="aucune">Sélectionner une matière</<option>
			<option value="francais">Français</<option>
			<option value="histoire">Histoire</<option>
			<option value="mathematique">Mathématique</<option>
			<option value="eps">EPS</<option>
			<option value="science">Science</<option>
			<option value="anglais">Anglais</<option>
		</select>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Matière n°2</div>
		<select class="form-control" name="matiere_2_prof" id="matiere_for_note">
			<option value="aucune">Sélectionner une matière</<option>
			<option value="francais">Français</<option>
			<option value="histoire">Histoire</<option>
			<option value="mathematique">Mathématique</<option>
			<option value="eps">EPS</<option>
			<option value="science">Science</<option>
			<option value="anglais">Anglais</<option>
		</select>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Matière n°3</div>
		<select class="form-control" name="matiere_3_prof" id="matiere_for_note">
			<option value="aucune">Sélectionner une matière</<option>
			<option value="francais">Français</<option>
			<option value="histoire">Histoire</<option>
			<option value="mathematique">Mathématique</<option>
			<option value="eps">EPS</<option>
			<option value="science">Science</<option>
			<option value="anglais">Anglais</<option>
		</select>
	</div>';

	return $texte;
}
// fonction permettant modifier un prof
function modifyProfForAdmin($profID, $matiere1, $matiere2, $matiere3, $tel, $adresse, $email) {
	$bdd = connectionDB();

	$reponse = $bdd->exec('UPDATE `professeurs` SET `tel`='.$tel.', `adresse`="'.$adresse.'", `email`="'.$email.'", `matiere1`="'.$matiere1.'", `matiere2`="'.$matiere2.'", `matiere3`="'.$matiere3.'"
	WHERE `id`='.$profID.'');

	if ($reponse == FALSE){
		return ('La mise à jour du professeur n\'as pas pus être effectuer!');
	}

	header('Location:admin');
}
// fonction pour afficher la liste des eleves
function showListProfForAdmin () {
	$bdd = connectionDB();

	$reponse = $bdd->query("SELECT id, prenom, nom FROM professeurs");

	$texte = '<option value="">Selectionner un professeur</option>';

	while ($donnees = $reponse->fetch())
	{
		$texte .= '<option value="'.$donnees['id'].'">'.ucfirst($donnees['prenom']).' '.strtoupper($donnees['nom']).'</option>';
	}

	return $texte;
}
// function permettant de supprimer un prof
function delProfForAdmin ($prof) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `professeurs` WHERE `id`=$prof");

	if ($reponse == FALSE){
		return ('La suppresion du professeur n\'as pas pus être effectuer');
	}

	header('Location:admin');
}
// function permettant d'ajouter ou modifier un membre du personnel
function addMemberForAdmin ($nom, $prenom, $niveauAdmin, $adresse, $email, $tel) {
	$bdd = connectionDB ();

  $identifiant = genereUsernameForAdmin($nom, $prenom);
  $mdp = generePasswordForAdmin(6);

	$reponse = $bdd->query("SELECT id, nom, prenom, identifiant FROM vie_scolaire");

	while ($donnees = $reponse->fetch()) {
		if ($donnees['nom'] == $nom && $donnees['prenom'] == $prenom) {
			return header('Location:admin?error=20');//utilsateur existe deja
		}
	}

	$reponse = $bdd->exec("INSERT INTO `vie_scolaire`(`identifiant`, `nom`, `prenom`, `mot_de_passe`, `niveau_admin`, `adresse`, `email`, `tel`)
	VALUES ('$identifiant', '$nom', '$prenom', '$mdp', $niveauAdmin, '$adresse', '$email', '$tel')");

	if ($reponse == FALSE){
		return ('L\'ajout d\'un membre du personnel n\'as pas pus être effectuer!');
	}

	header('Location:admin');
}
// function permettant d'afficher la liste des membre du personnel
function showListMemberForAdmin () {
	$bdd = connectionDB();

	$reponse = $bdd->query("SELECT id, prenom, nom FROM vie_scolaire");

	$texte = '<option value="">Selectionner un membre du personnel</option>';

	while ($donnees = $reponse->fetch())
	{
		$texte .= '<option value="'.$donnees['id'].'">'.strtoupper($donnees['nom']).' '.ucfirst($donnees['prenom']).'</option>';
	}

	return $texte;
}
//function permettant de modifier un member du personnel
function modifyMemberForAdmin ($membre, $niveauAdmin, $adresse, $email, $tel) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec('UPDATE `vie_scolaire` SET `niveau_admin`="'.$niveauAdmin.'", `adresse`="'.$adresse.'", `email`="'.$email.'", `tel`="'.$tel.'"
	WHERE `id`='.$membre.'');

	if ($reponse == FALSE){
		return ('La mise à jour du membre du personnel n\'as pas pus être effectuer!');
	}

	header('Location:admin');
}
// function permettant de supprimer un membre du personnel
function delMemberForAdmin ($member) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `vie_scolaire` WHERE `id`=$member");

	if ($reponse == FALSE){
		return ('La suppresion du membre du personnel n\'as pas pus être effectuer');
	}

	header('Location:admin');
}
// function permettant d'ajouter une classe
function addClasseForAdmin ($classe) {
	$bdd = connectionDB ();

	$reponse = $bdd->query("SELECT id, nom FROM classe");

	while ($donnees = $reponse->fetch()) {
		if ($donnees['nom'] == $classe) {
			return header('Location:admin?error=19');
		}
	}

	$reponse = $bdd->exec("INSERT INTO `classe` (`nom`, `emploi_du_temps`, `moyenne`) VALUES ('$classe', 'NO-CONFIG', 0)");

	if ($reponse == FALSE) {
		return ('L\'ajout de la classe a échoué!');
	}

	header('Location:admin');
}
// function permettant de supprimer une classe
function delClasseForAdmin ($classe) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `classe` WHERE `nom`='$classe'");

	if ($reponse == FALSE) {
		return ('La suppresion de la classe n\'as pas pus être effectuer');
	}

	header('Location:admin');
}
// fin de la parti page administration
?>
