<?php
include ('forMySQL.php');

function verifUserIfExist($users){
	$bdd = connectionDB();
	$reponse = $bdd->query('SELECT id, identifiant FROM eleves');
	while ($donnees = $reponse->fetch())
	{
		if ($users == $donnees['identifiant']) {
			echo 'Identifiant <b>'.$donnees['identifiant'].'</b> trouvée!';
			return $donnees['id'];
		}
	}
	return 'Cette utilisateur na pas été trouvé!';
}

function verifPassIsUser($user, $pass) {
	$bdd = connectionDB();
	$id = verifUserIfExist($user);
	$reponse = $bdd->query('SELECT mot_de_passe, classe FROM eleves WHERE id='.$id.'');
	$donnees = $reponse->fetch();
	if ($pass != $donnees['mot_de_passe']) {
		return ('Mot de passe incorrect!');
	}
	$_SESSION['users'] = $user;
	$_SESSION['userid'] = $id;
	$_SESSION['classe'] = $donnees['classe'];
	return header('Location: ../controller/c_eleve.php');
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
?>
