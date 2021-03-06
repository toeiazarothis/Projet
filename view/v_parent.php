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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="./view/css/bootstrap.css" rel="stylesheet">
    <link  href="./view/css/connecter.css" rel="stylesheet">


    <title>Parent - iSchool Notes</title>
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
          <a class="navbar-brand" href="#">iSchool Notes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#top" class="js-scrollTo">Accueil</a></li>
            <!-- <li><a href="#note" class="page-scroll">Note</a></li>
            <li><a href="#devoir" class="page-scroll">Devoir</a></li> -->
            <li><a href="c_eleve.php">Elève</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parent <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#absence" class="js-scrollTo">Absence</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Informations administratives</li>
                <li><a href="#prof" class="js-scrollTo">Appréciation des professeurs</a></li>
                <li><a href="#administration" class="js-scrollTo">Appréciation de la direction</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="contact">Contact</a></li>
            <li><a href="accueil"><?php echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']); ?>  (Se déconnecter <i class="fa fa-power-off" aria-hidden="true"></i>)</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header>
      <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Grâce à ce site, vous allez pouvoir visualiser votre évolution scolaire.</div>
        </div>
      </div>
    </header>

    <section id="absence" class="bg-light-gray">
      <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Absences</h2>
                <h3 class="section-subheading text-muted">Ici se trouve les différentes absences enregistrées dernièrement.<br>Si l'une de ces absences vous apparait comme "étrange", contactez-nous rapidement</h3>
            </div>
            <br>
            <div class="col-md-8 col-md-offset-2 text-center">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
        </div>
    </section>

    <section id="prof">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Appréciation des professeurs</h2>
            <h3 class="section-subheading text-muted">Ici se trouve les différentes appréciations données par le corps enseignant de l'etablissement.<br>Si l'une de ces appréciations vous apparait comme "étrange", contactez-nous rapidement</h3>
          </div>
          <br>
          <div class="col-md-8 col-md-offset-2 text-center">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="administration" class="bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Appréciation de la direction</h2>
            <h3 class="section-subheading text-muted">Ici se trouve les différentes appréciations données par le corps administratif de l'établissement.<br>Si l'une de ces appréciations vous apparait comme "etrange", contactez-nous rapidement</h3>
          </div>
          <br>
          <div class="col-md-8 col-md-offset-2 text-center">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- <section id="">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Titre</h2>
            <h3 class="section-subheading text-muted">Sous titre.</h3>
          </div>
        </div>
      </div>
    </section> -->






    <!-- Bootstrap core JavaScript ======================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
