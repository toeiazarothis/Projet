<?php
include 'config.php';
$conn =	new PDO("mysql:host=localhost;dbname=u240317083_notes", USER, PWD);
 $sql = "SELECT id, nom_eleve, prenom_eleve, classe, adresse_parent, email_parent, tel_parent FROM eleves";
 $result = $conn->query($sql);
echo '<table border=1px>
<tr>
<td><b>ID</b></td>
<td><b>Nom de élève</b></td>
<td><b>Prenom de élève</b></td>
<td><b>Classe</b></td>
<td><b>Adress</b></td>
<td><b>E_mail</b></td>
<td><b>Tel de parent</b></td>
<td></td>
</tr>';
while ($row = $result->fetch())
{
  echo '<form class="" action="update.php" method="post">';
  echo '<tr>';
  echo '<td><input type="number" name="id" value="'.$row['id'].'" readonly></td>';
  echo '<td><input type="text" name="nom" value="'.$row['nom_eleve'].'" readonly></td>';
  echo '<td><input type="text" name="prenom" value="'.$row['prenom_eleve'].'" readonly></td>';
  echo '<td><input type="text" name="class" value="'.$row['classe'].'" autocomplete="off"></td>';
  echo '<td><input type="text" name="address" value="'.$row['adresse_parent'].'" autocomplete="off"></td>';
  echo '<td><input type="text" name="email" value="'.$row['email_parent'].'" autocomplete="off"></td>';
  echo '<td><input type="text" name="tel" value="'.$row['tel_parent'].'" autocomplete="off"></td>';
  echo '<td>'.'<input type="submit" value="update">'.'</td>';
  echo '</tr>';
  echo '</form>';
}
echo '</table>';
 ?>
