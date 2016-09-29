 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>ajouteleve</title>
   </head>
   <body>
     <div id="login">
       <h2> ajouter élève</h2>
        <form class="form" action="ajoute.php" method="post">
          <table>
            <tr>
              <td><label for="nom">Nom</label></td>
              <td><input type="text" name="nom"  autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="prenom">Pronom</label></td>
              <td><input type="text" name="pronom"  autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="class">Class</label></td>
              <td><input type="text" name="class" autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="nomparent">Nom parent</label></td>
              <td><input type="text" name="nomparent"  autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="prenomparent">PreNom parent</label></td>
              <td><input type="text" name="prenomparent"  autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="prefparent">Prefession Parent</label></td>
              <td><input type="text" name="prefparent"  autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="address">Adress</label></td>
              <td><input type="text" name="adress" autocomplete="off"  Required></td>
            </tr>
            <tr>
              <td><label for="email">E_mail</label></td>
              <td><input type="email" name="email" autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><label for="tel">Tel de parent</label></td>
              <td><input type="tel" name="tel"  autocomplete="off" Required></td>
            </tr>
            <tr>
              <td><input type="reset"  value="reset"></td>
              <td><input type="submit"  value="Ajouter"></td>
            </tr>
          </table>
        </form>
    </div>
   </body>
 </html>
