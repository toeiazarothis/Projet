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
    <link rel="shortcut icon" href="../view/img/stylo.ico">
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="Petit site des familles" />
    <meta property="og:image" content="image a mettre" />

    <!-- Link -->
    <link href="../view/css/bootstrap.css" rel="stylesheet">
    <link  href="../view/css/connecter.css" rel="stylesheet">


    <title>Eleve - iSchool Notes</title>
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
            <li><a href="c_eleve.php">Eleve</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parent <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#absence">Absence</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Information administrative</li>
                <li><a href="#">Appreciation de prof</a></li>
                <li><a href="#">Appreciation de la direction</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="contact.php">Contact</a></li>
            <li><a href="#">Deconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header>
      <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Grace a ce site vous allez pouvoir visualiser votre evolution scolaire.</div>
        </div>
      </div>
    </header>


    <section id="absence" class="bg-light-gray">
      <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Absences</h2>
                <h3 class="section-subheading text-muted">Ici ce trouve les differentes absence enregistrer dernierement.<br>Si une de c'est absence vous apparait comme "etrange" contacter nous rapidement</h3>
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
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/jquery/jquery.min.js"></script>


  </body>
</html>
