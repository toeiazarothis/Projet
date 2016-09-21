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


    <title>Professeur - iSchool Notes</title>
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
            <!-- <li><a href="#note" class="page-scroll">Note</a></li>
            <li><a href="#devoir" class="page-scroll">Devoir</a></li> -->
            <li><a href="#Note">Note</a></li>
            <li><a href="#Devoir">Devoir</a></li>
            <li><a href="#AbsEleve">Absence d'eleve</a></li>
            <li><a href="#Appreciation">Appréciation</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="contact.php">Contact</a></li>
            <li><a href="c_index.php">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header>
      <div class="container">
        <div class="intro-text"><br><br><br><br><br><br><br><br>
        </div>
      </div>
    </header>

    <section id="Note" class="bg bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Note</h2>
              <h3 class="section-subheading text-muted">Enregistrer rapidement les notes du dernier contrôle pour transmettre l'information à l'élève.</h3>
          </div>
          <div class="col-xs-4 col-xs-offset-4 text-center">
            <textarea class="form-control" rows="3"></textarea><br>
            <a class="btn btn-success" href="#" role="button">Rajouter la note</a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-md-offset-1 text-center"><br>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="Devoir">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Devoir</h2>
              <h3 class="section-subheading text-muted">Des devoirs à donner à vos élèves ? Rempliser ce formulaire.</h3>
          </div>
          <div class="col-lg-10 col-md-offset-1 text-center">
            <textarea class="form-control" rows="3"></textarea><br>
            <a class="btn btn-success" href="#" role="button">Rajouter le devoir</a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-md-offset-1 text-center"><br>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="AbsEleve" class="bg bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Déclaration d'abscence</h2>
              <h3 class="section-subheading text-muted">Pour déclarer l'absence d'un élève, il vous suffit de choisir son nom et de cliquer dessus, pour ensuite envoyer l'information au parent et dans l'espace vie scolaire</h3>
          </div>
          <div class="col-md-8 col-md-offset-2 text-center">
            <div class="col-xs-5">
              <select class="form-control">
                <option>Liste des classes</option>
              </select>
            </div>
            <div class="col-xs-5">
              <select class="form-control">
                <option>Liste des élèves à mettre en absent</option>
              </select>
            </div>
            <div class="col-xs-2">
              <a class="btn btn-danger" href="#" role="button">Absent</a>
            </div>
          </div>


        </div>
        <div class="row">
          <div class="col-lg-10 col-md-offset-1">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
    </section>

    <section id="Appreciation">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Appreciation</h2>
              <h3 class="section-subheading text-muted">Ici vous allez pouvoir marquer une appréciation au sujet d'un élève de votre choix</h3>
          </div>
          <div class="col-lg-10 col-md-offset-1 text-center">
            <textarea class="form-control" rows="3"></textarea><br>
            <a class="btn btn-success" href="#" role="button">Ajouter l'appréciation</a>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
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
