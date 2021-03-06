<?php
require ('forMySQL.php');
require ('errorAndSuccess.php');

// debut de  la partie page index
// cette partie permet de verifier si l'utilisateur existe dans la BDD
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
	return header('Location:accueil?es=1');//Utilisateur inexitant
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
			return header('Location:accueil?es=2');
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
			return header('Location:accueil?es=2');
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
			return header('Location:accueil?es=2');
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

	$reponse = $bdd->query('SELECT eleve, note, matiere, coefficient FROM notes ORDER BY id DESC');

	$texte = '';

	while ($donnees = $reponse->fetch())
	{
		if ($donnees['eleve'] == $userID && $donnees['matiere'] == $matiere) {
			$texte .= $donnees['note'].'/20(Coeff: '.$donnees['coefficient'].') ';
		}
	}

	return $texte;
}
// fonction pour afficher la moyenne de lamatiere X
function moyenneForMatiereForEleve ($userID, $matiere) {
	$bdd = connectionDB();

	$reponse = $bdd->query('SELECT eleve, note, matiere, coefficient FROM notes ORDER BY id DESC');

	$nbCoef = 0;

	$additionNote = 0;

	while ($donnees = $reponse->fetch())
	{
		if ($donnees['eleve'] == $userID && $donnees['matiere'] == $matiere) {
			$additionNote += $donnees['note'] * $donnees['coefficient'];
			$nbCoef += $donnees['coefficient'];
		}
	}

	if ($additionNote >= 1) {
		$moyenneGeneral = $additionNote / $nbCoef;
		$_SESSION['moyenneGeneral'] += $moyenneGeneral;
		$_SESSION['nbNoteMoyenneGeneral'] += 1;
		return $moyenneGeneral;
	}
}
// fonction pour afficher la moyenne general
function moyenneForEleve () {
	if (isset ($_SESSION['moyenneGeneral'], $_SESSION['nbNoteMoyenneGeneral']) && $_SESSION['moyenneGeneral'] >= 1) {
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
 						<input type="number" class="form-control" id="NoteScolaire" name="'.$donnees['id'].'" step="0.1" value="" min="0" max="20" placeholder="Entrer la note de l\'élève">
 						<div class="input-group-addon">20</div>
 					</div>
 				</div>';
 		}
 	}

 	return $texte;
}

// fonction permettant d'envoyer la note dans la colonne note de la table Eleve de la BDD
function sendNoteForProf ($eleve, $matiere, $classe, $coef, $note) {
	$bdd = connectionDB();

	$reponse = $bdd->exec('INSERT INTO `notes` (`eleve`, `matiere`, `classe`, `note`, `coefficient`) VALUES ('.$eleve.', "'.$matiere.'", "'.$classe.'", '.$note.', '.$coef.')');

	if ($reponse == FALSE){
        header('Location:prof?es=26');//echec envoie note
	}

    //header('Location:prof?es=27');//succes envoie note
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
				header('Location:prof?es=3');//echec envoie devoir
			}
			header('Location:prof?es=4');//envoie devoir reussi
		}
	}

	$reponse = $bdd->exec('INSERT INTO `cours_devoirs`(`matiere`, `classe`, `contenu`, `devoir`) VALUES ("'.$matiere.'", "'.$classe.'", "'.$cours.'", "'.$devoir.'")');

	if ($reponse == FALSE){
		header('Location:prof?es=3');//echec envoie devoir
	}

	header('Location:prof?es=4');//envoie devoir reussi
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
        header('Location:prof?es=5');//echec envoie absence
	}

    // header('Location:prof?es=6');//succes envoie absence
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
        header('Location:prof?es=7');//echec envoie appreciation
	}

	header('Location:prof?es=8');//succes envoie appreciation
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

// fonction permettant d'ajouter ou modifier un élève
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
                header('Location:admin?es=9');//echec ajout/modif eleve
			}

            header('Location:admin?es=10');//succes ajout/modif eleve
		}
	}

	$reponse = $bdd->exec("INSERT INTO `eleves`(`nom_eleve`, `prenom_eleve`, `classe`, `identifiant`, `mot_de_passe`, `nom_parent`, `prenom_parent`, `adresse_parent`, `email_parent`, `tel_parent`, `appreciation_eleve`)
	VALUES ('$nom', '$prenom', '$classe', '$identifiant', '$mdp', '$nom_parent', '$prenom_parent', '$adresse_parent', '$email_parent', '$tel_parent', 'Aucune appréciation')");

	if ($reponse == FALSE){
        header('Location:admin?es=9');//echec ajout/modif eleve
	}

    header('Location:admin?es=10');//succes ajout/modif eleve
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
// fonction pour afficher la liste des élèves
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
// fonction permettant d'afficher le formulaire pour la MAJ élève
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
		<label class="sr-only" for="exampleInputAmount">Prénom de l\'élève</label>
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
// function permettant de supprimer un élève
function delEleveForAdmin ($eleve) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `eleves` WHERE `id`=$eleve");

	if ($reponse == FALSE){
        header('Location:admin?es=11');//echo suppresion eleve
	}

    header('Location:admin?es=12');//succes suppresion eleve
}


// fonction permettant d'ajouter un prof
function addProfForAdmin($nom, $prenom, $matiere1, $matiere2, $matiere3, $tel, $adresse, $email) {
    $bdd = connectionDB();

    $identifiant = genereUsernameForAdmin($nom, $prenom);
    $mdp = generePasswordForAdmin(6);

    $reponse = $bdd->query("SELECT id, nom, prenom, identifiant FROM professeurs");

    while ($donnees = $reponse->fetch()) {
        if ($donnees['nom'] == $nom && $donnees['prenom'] == $prenom) {
            return header('Location:admin?es=17');//nom&prenom existe deja
        }
    }

    $reponse = $bdd->exec("INSERT INTO `professeurs`(`nom`, `prenom`, `identifiant`, `mot_de_passe`, `tel`, `adresse`, `email`, `matiere1`, `matiere2`, `matiere3`)
    VALUES
    ('$nom', '$prenom', '$identifiant', '$mdp', '$tel', '$adresse', '$email', '$matiere1', '$matiere2', '$matiere3')");

    if ($reponse == FALSE){
        header('Location:admin?es=13');//echec ajout/modif prof
    }

    header('Location:admin?es=14');//succes ajout/modif prof
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
			<option value="aucune">Sélectionner une matière</option>
			<option value="francais">Français</option>
			<option value="histoire">Histoire</option>
			<option value="mathematique">Mathématique</option>
			<option value="eps">EPS</option>
			<option value="science">Science</option>
			<option value="anglais">Anglais</option>
		</select>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Matière n°2</div>
		<select class="form-control" name="matiere_2_prof" id="matiere_for_note">
			<option value="aucune">Sélectionner une matière</option>
			<option value="francais">Français</option>
			<option value="histoire">Histoire</option>
			<option value="mathematique">Mathématique</option>
			<option value="eps">EPS</option>
			<option value="science">Science</option>
			<option value="anglais">Anglais</option>
		</select>
	</div>
	<div class="input-group">
		<div class="input-group-addon">Matière n°3</div>
		<select class="form-control" name="matiere_3_prof" id="matiere_for_note">
			<option value="aucune">Sélectionner une matière</option>
			<option value="francais">Français</option>
			<option value="histoire">Histoire</option>
			<option value="mathematique">Mathématique</option>
			<option value="eps">EPS</option>
			<option value="science">Science</option>
			<option value="anglais">Anglais</option>
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
        header('Location:admin?es=13');//echec ajout/modif prof
	}

    header('Location:admin?es=14');//succes ajout/modif prof
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
        header('Location:admin?es=15');//echec suppression prof
	}

    header('Location:admin?es=16');//succes suppression prof
}
// function permettant d'ajouter ou modifier un membre du personnel
function addMemberForAdmin ($nom, $prenom, $niveauAdmin, $adresse, $email, $tel) {
	$bdd = connectionDB ();

  $identifiant = genereUsernameForAdmin($nom, $prenom);
  $mdp = generePasswordForAdmin(6);

	$reponse = $bdd->query("SELECT id, nom, prenom, identifiant FROM vie_scolaire");

	while ($donnees = $reponse->fetch()) {
		if ($donnees['nom'] == $nom && $donnees['prenom'] == $prenom) {
			return header('Location:admin?es=17');//nom&prenom existe deja
		}
	}

	$reponse = $bdd->exec("INSERT INTO `vie_scolaire`(`identifiant`, `nom`, `prenom`, `mot_de_passe`, `niveau_admin`, `adresse`, `email`, `tel`)
	VALUES ('$identifiant', '$nom', '$prenom', '$mdp', '$niveauAdmin', '$adresse', '$email', '$tel')");

	if ($reponse == FALSE){
        header('Location:admin?es=18');//echec ajout/maj membre personnel
	}

    header('Location:admin?es=19');//succes ajout/maj membre personnel
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
        header('Location:admin?es=18');//echec ajout/modif membre perso
	}

    header('Location:admin?es=19');//succes ajout/modif membre perso
}
// function permettant de supprimer un membre du personnel
function delMemberForAdmin ($member) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `vie_scolaire` WHERE `id`=$member");

	if ($reponse == FALSE){
        header('Location:admin?es=20');//echec supp membre du personnel
	}

    header('Location:admin?es=21');//succes supp membre du personnel
}
// function permettant d'ajouter une classe
function addClasseForAdmin ($classe) {
	$bdd = connectionDB ();

	$reponse = $bdd->query("SELECT id, nom FROM classe");

	while ($donnees = $reponse->fetch()) {
		if ($donnees['nom'] == $classe) {
			return header('Location:admin?es=22');//echec add class
		}
	}

	$reponse = $bdd->exec("INSERT INTO `classe` (`nom`, `emploi_du_temps`, `moyenne`) VALUES ('$classe', 'NO-CONFIG', 0)");

	if ($reponse == FALSE) {
        header('Location:admin?es=22');//echec add class
	}

    header('Location:admin?es=23');//succes add class
}
// function permettant de supprimer une classe
function delClasseForAdmin ($classe) {
	$bdd = connectionDB ();

	$reponse = $bdd->exec("DELETE FROM `classe` WHERE `nom`='$classe'");

	if ($reponse == FALSE) {
        header('Location:admin?es=24');//echec del class
	}

    header('Location:admin?es=25');//succes del class
}
// fin de la parti page administration

// Script temporaire
function showUserAndPassWord () {
	$bdd = connectionDB();

	$reponse = $bdd->query("SELECT id, identifiant, mot_de_passe FROM eleves");

	$texte = '<h3>Liste identifiant élèves:<h3>';

	while ($donnees = $reponse->fetch())
	{
		$texte .= $donnees['identifiant'].' -> '.$donnees['mot_de_passe'].'<br>';
	}

	$reponse = $bdd->query("SELECT id, identifiant, mot_de_passe FROM professeurs");

	$texte .= '<h3>Liste identifiant professeurs:<h3>';

	while ($donnees = $reponse->fetch())
	{
		$texte .= $donnees['identifiant'].' -> '.$donnees['mot_de_passe'].'<br>';
	}

	$reponse = $bdd->query("SELECT id, identifiant, mot_de_passe FROM vie_scolaire");

	$texte .= '<h3>Liste identifiant membre du personnel:<h3>';

	while ($donnees = $reponse->fetch())
	{
		$texte .= $donnees['identifiant'].' -> '.$donnees['mot_de_passe'].'<br>';
	}

	return $texte;
}
?>
