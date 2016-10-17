<!DOCTYPE html>
<html>
  <head>
    <!-- Meta -->
    <meta lang="fr">
    <meta content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/stylo.ico">
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="Petit site des familles" />
    <meta property="og:image" content="image a mettre" />

    <!-- Link -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="../view/css/bootstrap.css" rel="stylesheet">
    <link  href="../view/css/connecter.css" rel="stylesheet">


    <title>Vie Scolaire - iSchool Notes</title>
  </head>
  <body id="top">
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offest-1 text-center">
            <div id="login">
              <h2> ajouter élève</h2>
               <form class="form" action="ajoute.php" method="post">
                 <table>
                   <tr>
                     <td><label for="nom">Nom</label></td>
                     <td><input type="text" name="nom"  autocomplete="off" Required></td>
                   </tr>
                   <tr>
                     <td><label for="prenom">Prénom</label></td>
                     <td><input type="text" name="prénom"  autocomplete="off" Required></td>
                   </tr>
                   <tr>
                     <td><label for="class">Classe</label></td>
                     <td><input type="text" name="classe" autocomplete="off" Required></td>
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
                     <td><label for="prefparent">Profession Parent</label></td>
                     <td><input type="text" name="profparent"  autocomplete="off" Required></td>
                   </tr>
                   <tr>
                     <td><label for="address">Adresse</label></td>
                     <td><input type="text" name="adresse" autocomplete="off"  Required></td>
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
          </div>
        </div>
      </div>
    </section>


    <!-- Bootstrap core JavaScript ======================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/jquery/jquery.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.js-scrollTo').on('click', function() { // Au clic sur un élément
          var page = $(this).attr('href'); // Page cible
          var speed = 750; // Durée de l'animation (en ms)
          $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
          return false;
        });
      });
    </script>

  </body>
</html>
