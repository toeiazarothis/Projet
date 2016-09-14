  <?php
  include('id.php');
  //chiens
  function listeMoiLesChiens(){
    $connexion = new PDO('mysql:host=mysql.hostinger.fr;dbname=u240317083_notes', UTILISATEUR, PASS);
    $liste = $connexion->query('SELECT nom_ch FROM chiens GROUP BY nom_ch ASC');
    $result = $liste->fetchALL();
    return $result;
  }
  ?>
