<?php
//session_start();
include 'config.php';
// $_SESSION['nom']= $_POST['nom'];
// $_SESSION['pronom']= $_POST['pronom'];
// $_SESSION['class']= $_POST['class'];
// $_SESSION['nomparent']= $_POST['nomparent'];
// $_SESSION['prenomparent']= $_POST['prenomparent'];
// $_SESSION['prefparent']= $_POST['prefparent'];
// $_SESSION['adress']= $_POST['adress'];
// $_SESSION['email']= $_POST['email'];
// $_SESSION['tel']= $_POST['tel'];

function motdepass($nom,$prenom)
{
  //lengh $nom,$prenom
  $a = (strlen($nom)) - 1;
  $b = (strlen($prenom)) - 1;
  // return the first nom prenom
  $c = substr(strrev($nom), $a);
  $d = substr(strrev($prenom), $b);
  $f = $c . $d;
  $pass = $f.rand(1357911,9999999).'_'.substr($nom,$a).substr($prenom,$b);
  return $pass;
}
function identifiant($nom,$prenom)
{
  //lengh $nom,$prenom
  $a = (strlen($nom)) -1;
  $b = (strlen($prenom)) -1;
  // return the second nom prenom
  $c = substr(strrev($nom), $a);
  $d = substr(strrev($prenom), $b);
  $f = $c . $d;
  $user = $f.'_'.substr($nom,$a).rand(2468,10000);
  return $user;
}
function ajouteleve()
{
  $nomeleve = $_POST['nom'];
  $pronomeleve = $_POST['prenom'];
  $class = $_POST['classe'];
  $nomparent = $_POST['nomparent'];
  $prenomparent = $_POST['prenomparent'];
  $prefparent = $_POST['prefparent'];
  $adress = $_POST['adresse'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $username = identifiant($_POST['nom'],$_POST['pronom']);
  $password = motdepass($_POST['nom'],$_POST['pronom']);
  try {
    $conn =	new PDO("mysql:host=localhost;dbname=u240317083_notes", USER, PWD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO eleves
            (nom_eleve	, prenom_eleve, classe, identifiant, mot_de_passe, nom_parent, prenom_parent,
              profession_parent, adresse_parent, email_parent, tel_parent)
            VALUES ('$nomeleve', '$pronomeleve', '$class', '$username',
            '$password', '$nomparent', '$prenomparent', '$prefparent',
            '$adress', '$email', '$tel')";
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
function supprimer()
{
  $conn =	new PDO("mysql:host=localhost;dbname=u240317083_notes", USER, PWD);
  $sql = " DELETE FROM eleves WHERE id='".$_GET['del_id']."'";
  $conn->exec($sql);
}
function update()
{
  $id = $_POST['id'];
  $nclasse = $_POST['class'];
  $nadresse = $_POST['address'];
  $nemail = $_POST['email'];
  $ntel = $_POST['tel'];
  $conn =	new PDO("mysql:host=localhost;dbname=u240317083_notes", USER, PWD);
  $sql = " UPDATE eleves
          SET classe= '$nclasse',
              adresse_parent = '$nadresse',
              email_parent = '$nemail',
              tel_parent = '$ntel'
          WHERE id = '$id' ";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $conn = null;
  header("Location:menuupdate.php");
}
?>
