<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  </head>
  <body>
<?php
include 'config.php';
$conn =	new PDO("mysql:host=localhost;dbname=u240317083_notes", USER, PWD);
 $sql = "SELECT id, nom_eleve, prenom_eleve FROM eleves";
 $result = $conn->query($sql);
 ?>
<table>
<tr>
<td><b>ID</b></td>
<td><b>Nom de élève</b></td>
<td><b>Prenom de élève</b></td>
<td></td>
</tr>
<?php
while ($row = $result->fetch())
{
  echo '<tr>';
  echo '<td><input type="number" name="id" value="'.$row['id'].'" readonly></td>';
  echo '<td><input type="text" name="nom" value="'.$row['nom_eleve'].'" readonly></td>';
  echo '<td><input type="text" name="prenom" value="'.$row['prenom_eleve'].'" readonly></td>';
  echo '<td>'.'<button type="button" onclick="deleteme('.$row['id'].')" name="button">DELETE</button></td>';
  echo '</tr>';
}
echo '</table>';
$conn = null;
 ?>
<script type="text/javascript">
  function deleteme(delid)
  {
    if (confirm("Vous allez supprimer le dossier de l\'élève !!fait attantion que vous ne pouvez pas annuler cette opération!"))
    {
       window.location.href='delete.php?del_id=' +delid+'';
      return true;
    }
  }
</script>
</body>
</html>
