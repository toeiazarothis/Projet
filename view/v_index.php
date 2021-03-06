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
    <link rel="shortcut icon" href="../view/img/stylo.ico">
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="Petit site des familles" />
    <meta property="og:image" content="image a mettre" />

    <!-- Link -->
    <link href="./view/css/bootstrap.css" rel="stylesheet">
    <link  href="./view/css/cover.css" rel="stylesheet">


    <title>iSchool Notes.</title>
  </head>
  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SchoolNotes</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="accueil">Accueil</a></li>
                  <li><a href="contact">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Bienvenue sur iSchool Notes</h1>
            <p class="lead">Voici la première plate-forme scolaire entièrement adaptatif et responsive</p>
            <p class="lead">
            <div class="col-md-6 col-md-offset-3">
              <form class="form-signin" action="accueil" method="POST">
                <h2 class="form-signin-heading">Connectez-vous</h2>
                <label for="inputUsername" class="sr-only">Identifiant</label>
                <input type="text" id="inputUsername" class="form-control" placeholder="Identifiant" name="users" required autofocus><br>
                <label for="inputPassword" class="sr-only">Mot de passe</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required><br>
                <?php  ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
              </form>
          </div>
          </p>
        </div>

        <div class="mastfoot">
          <div class="inner">
            <p>Copyright &copy; Mikomi &trade; ,   All rights reserved .</p>
          </div>
        </div>

      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./view/js/bootstrap.min.js"></script>
    <script src="./view/jquery/jquery.min.js"></script>
    <!-- Script pour message error or success -->
    <script>
    	$(document).ready(function() {
        $("#error:visible").each( function() { // On verifie si lelement est afficher
          var hide = setTimeout('$("#error").fadeOut(500)', 2500);
        });
    	});
    </script>

  </body>
</html>
