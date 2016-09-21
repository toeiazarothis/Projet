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
          <a class="navbar-brand" href="#">iSchool Notes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#" class="page-scroll">Accueil</a></li>
            <!-- <li><a href="#note" class="page-scroll">Note</a></li>
            <li><a href="#devoir" class="page-scroll">Devoir</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eleve <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#note" class="page-scroll">Note</a></li>
                <li><a href="#devoir" class="page-scroll">Devoir</a></li>
              </ul>
            </li>
            <!-- <li><a href="c_parent.php">Parent</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="c_index.php">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header>
      <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Grâce à ce site vous allez pouvoir visualiser votre évolution scolaire.</div><br><br><br>
        </div>
      </div>
    </header>


    <section id="note" class="bg-light-gray">
      <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Les Notes</h2>
                <h3 class="section-subheading text-muted">Ici ce trouve les differentes notes.<br>Afin de les consulter, il vous suffit simplement de cliquer sur la matière concernée</h3>
                <br><br><br>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-md-offset-1 text-center">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Français</a>
                  </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiere ($_SESSION['userid'], 'francais') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Histoire</a>
                  </h4>
                </div>
                <div id="collapse11" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiere ($_SESSION['userid'], 'histoire') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">Mathematique</a>
                  </h4>
                </div>
                <div id="collapse12" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiere ($_SESSION['userid'], 'mathematique') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">EPS</a>
                  </h4>
                </div>
                <div id="collapse13" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiere ($_SESSION['userid'], 'eps') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">Science</a>
                  </h4>
                </div>
              <div id="collapse14" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matière ($_SESSION['userid'], 'science') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">Anglais</a>
                  </h4>
                </div>
                <div id="collapse15" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matière ($_SESSION['userid'], 'anglais') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse16">template</a>
                  </h4>
                </div>
                <div id="collapse16" class="panel-collapse collapse">
                  <div class="panel-body">Vous avez eu $note/20 à votre dernier controle.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

		<section id="devoir">
      <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Les Devoirs</h2>
                <h3 class="section-subheading text-muted">Ici ce trouve le résumer du cours & le devoir à effectuer.<br>Afin de les consulter, il vous suffit simplement de cliquer sur la matière concernée</h3>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-md-offset-1 text-center">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Français</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoir ($_SESSION['users'], $_SESSION['classe'], 'francais') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Histoire</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoir ($_SESSION['users'], $_SESSION['classe'], 'histoire') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Mathematique</a>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoir ($_SESSION['users'], $_SESSION['classe'], 'mathematique') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">EPS</a>
                  </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoir ($_SESSION['users'], $_SESSION['classe'], 'eps') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Science</a>
                  </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoir ($_SESSION['users'], $_SESSION['classe'], 'science') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Anglais</a>
                  </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoir ($_SESSION['users'], $_SESSION['classe'], 'anglais') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">template</a>
                  </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse">
                  <div class="panel-body">Vous avez eu $note/20 à votre dernier controle.
                  </div>
                </div>
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
