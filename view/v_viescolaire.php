<!DOCTYPE html>
<html>
  <head>
    <!-- Meta -->
    <meta lang="fr">
    <meta content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/stylo.ico">
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="Petit site des familles" />
    <meta property="og:image" content="image a mettre" />

    <!-- Link -->
    <link href="../view/css/bootstrap.css" rel="stylesheet">
    <link  href="../view/css/connecter.css" rel="stylesheet">


    <title>SchoolNotes</title>
  </head>
  <body>
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
          <a class="navbar-brand" href="#">iSchool Note</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#" class="page-scroll">Accueil</a></li>
            <!-- <li><a href="#note" class="page-scroll">Note</a></li>
            <li><a href="#devoir" class="page-scroll">Devoir</a></li> -->
            <li><a href="#event">Evenement</a></li>
            <li><a href="#absProf">Absence Professeur</a></li>
            <li><a href="#absEleve">Absence Eleve</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Deconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <section id="evet" class="bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Evenement</h2>
            <h3 class="section-subheading text-muted">Calendrier d'evenement</h3>
            <p>
              Afin de communiquer au mieux les informations sur les different evenement qui concerne l'ecole nous avons mis en place un agenda virtuel qui vous permet a vous parent comme enfant de voir les sortie prevue.
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
            <h3 class="section-subheading text-muted">Declarer l'absence d'un professeur</h3>
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
                <div class="panel-body">Liste des prof absent.</div>
                <select class="form-control col-md-6">
                  <option>Liste des prof a mettre en absennt</option>
                </select>
                Declarer le professeur absent ?<br>
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
            <h2 class="section-heading">Absence d'éleve</h2>
            <h3 class="section-subheading text-muted">Declarer l'absence d'un eleve</h3>
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
                <div class="panel-body">Liste des eleve absent.</div>
                  <select class="form-control">
                    <option>Liste des eleve a mettre en absennt</option>
                  </select>
                  <br>
                  Declarer l'eleve absent ?
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

  </body>
</html>
