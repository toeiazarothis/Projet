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
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="../view/css/bootstrap.css" rel="stylesheet">
    <link  href="../view/css/connecter.css" rel="stylesheet">


    <title>Vie Scolaire - iSchool Notes</title>
  </head>
  <body id="top">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#top" class="js-scrollTo">iSchool Notes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#event" class="js-scrollTo">Evénement</a></li>
            <li><a href="#absProf" class="js-scrollTo">Absence professeur</a></li>
            <li><a href="#absEleve" class="js-scrollTo">Absence élève</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="admin">Administration</a></li>
            <li><a href="accueil">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <section id="evet" class="bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Evénement</h2>
            <h3 class="section-subheading text-muted">Calendrier d'événement</h3>
            <p>
              Afin de communiquer au mieux les informations sur les differents événements qui concernent l'école, nous avons mis en place un agenda virtuel qui vous permet à vous, parent, ainsi que vos enfants de voir les sorties prevues.
            </p>
            <a class="btn btn-warning" href="v_event.php" role="button">L'agenda !</a>
          </div>
        </div>
      </div>
    </section>

    <section id="absProf">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Absence de professeur</h2>
            <h3 class="section-subheading text-muted">Déclarer l'absence d'un professeur</h3>
          </div>
        </div>
          <div class="row text-center">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Absence</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body">Liste des prof. absents</div>
                  <select class="form-control col-md-6">
                    <option>Liste des prof. à mettre en absent</option>
                  </select>
                  Déclarer le professeur absent ?<br>
                  <a class="btn btn-success" href="#" role="button">Oui</a>
                  <a class="btn btn-danger" href="#" role="button">Non</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section id="absEleve" class="bg-light-gray">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Absence d'élève</h2>
              <h3 class="section-subheading text-muted">Déclarer l'absence d'un élève</h3>
            </div>
          </div>
          <div class="row text-center">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Absence</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">Liste des élèves absents.</div>
                    <select class="form-control">
                      <option>Liste des élèves à mettre en absent</option>
                    </select>
                    <br>
                    Déclarer l'élève absent ?
                    <br>
                    <a class="btn btn-success" href="#" role="button">Oui</a>
                    <a class="btn btn-danger" href="#" role="button">Non</a>
                  </div>
                </div>
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
