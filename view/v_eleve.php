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


    <title>Elève - iSchool Notes</title>
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
            <li><a href="#top" class="js-scrollTo">Accueil</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Elève <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#note" class="js-scrollTo">Note</a></li>
                <li><a href="#devoir" class="js-scrollTo">Devoir</a></li>
                <li><a href="#appreciation" class="js-scrollTo">Appréciation</a></li>
              </ul>
            </li>
            <!-- <li><a href="c_parent.php">Parent</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="accueil"><?php echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']); ?>  (Se déconnecter <i class="fa fa-power-off" aria-hidden="true"></i>)</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Header avec image -->
		<header>
			<div class="container">
				<div class="intro-text">
					<div class="intro-lead-in">Bienvenue <?php 	echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']);  ?>.<br>
						Grâce à cette page, vous allez pouvoir visualiser votre évolution scolaire. Vous avez accès à vos notes ainsi que vos devoirs à réaliser.</div>
				</div>
			</div>
		</header>
    <!-- Fin header avec image -->

    <!-- Liste des notes scolaires -->
    <section id="note" class="bg-light-gray">
      <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Les Notes</h2>
                <h3 class="section-subheading text-muted">Ici se trouve les différentes notes.<br>Afin de les consulter, il vous suffit simplement de cliquer sur la matière concernée</h3>
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
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiereForEleve ($_SESSION['userid'], 'francais') ?></div>
                  <div class="panel-body"><h3>Votre Moyenne</h3><?php echo moyenneForMatiereForEleve ($_SESSION['userid'], 'francais'); ?></div>

                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Histoire</a>
                  </h4>
                </div>
                <div id="collapse11" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiereForEleve ($_SESSION['userid'], 'histoire') ?></div>
                  <div class="panel-body"><h3>Votre Moyenne</h3><?php echo moyenneForMatiereForEleve ($_SESSION['userid'], 'histoire'); ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">Mathématique</a>
                  </h4>
                </div>
                <div id="collapse12" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiereForEleve ($_SESSION['userid'], 'mathematique') ?></div>
                  <div class="panel-body"><h3>Votre Moyenne</h3><?php echo moyenneForMatiereForEleve ($_SESSION['userid'], 'mathematique'); ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">EPS</a>
                  </h4>
                </div>
                <div id="collapse13" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiereForEleve ($_SESSION['userid'], 'eps') ?></div>
                  <div class="panel-body"><h3>Votre Moyenne</h3><?php echo moyenneForMatiereForEleve ($_SESSION['userid'], 'eps'); ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">Science</a>
                  </h4>
                </div>
              <div id="collapse14" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiereForEleve ($_SESSION['userid'], 'science') ?></div>
                  <div class="panel-body"><h3>Votre Moyenne</h3><?php echo moyenneForMatiereForEleve ($_SESSION['userid'], 'science'); ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">Anglais</a>
                  </h4>
                </div>
                <div id="collapse15" class="panel-collapse collapse">
                  <div class="panel-body"><h3>Vos notes</h3><?php echo matiereForEleve ($_SESSION['userid'], 'anglais') ?></div>
                  <div class="panel-body"><h3>Votre Moyenne</h3><?php echo moyenneForMatiereForEleve ($_SESSION['userid'], 'anglais'); ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                  <h2 class="section-heading">Votre moyenne générale</h2>
                  <h3 class="section-subheading text-muted"><?php echo moyenneForEleve (); ?></h3>
                  <br><br><br>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Fin liste des notes scolaires -->

    <!-- Liste des devoirs scolaires -->
		<section id="devoir">
      <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Les Devoirs</h2>
                <h3 class="section-subheading text-muted">Ici se trouve le résumé du cours et les devoirs à effectuer.<br>Afin de les consulter, il vous suffit simplement de cliquer sur la matière concernée</h3>
                <br><br><br>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-md-offset-1 text-center">
            <div class="panel-group" id="accordion2">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1">Français</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoirForEleve ($_SESSION['users'], $_SESSION['classe'], 'francais') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">Histoire</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoirForEleve ($_SESSION['users'], $_SESSION['classe'], 'histoire') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse3">Mathématique</a>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoirForEleve ($_SESSION['users'], $_SESSION['classe'], 'mathématique') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse4">EPS</a>
                  </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoirForEleve ($_SESSION['users'], $_SESSION['classe'], 'eps') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse5">Science</a>
                  </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoirForEleve ($_SESSION['users'], $_SESSION['classe'], 'science') ?></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse6">Anglais</a>
                  </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo devoirForEleve ($_SESSION['users'], $_SESSION['classe'], 'anglais') ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Fin liste des devoirs scolaires -->
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <!-- Appreciation donné par le prof principal -->
    <section id="appreciation" class="bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <br><br><br>
              <h2 class="section-heading">Les Appréciations</h2>
              <h3 class="section-subheading text-muted">Ici se trouve les appréciations données par le professeur principal.<br>Afin de les consulter, il vous suffit simplement de cliquer ci-dessous</h3>
            <br><br><br>
              <br><br>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-offset-1 text-center">
            <div class="panel-group" id="accordion3">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion3" href="#collapse20">Appréciation Générale</a>
                  </h4>
                </div>
                <div id="collapse20" class="panel-collapse collapse in">
                  <div class="panel-body"><?php echo appreciationForEleve($_SESSION['userid']); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br><br><br>
      </div>
    </section>
    <!-- Fin appreciation donné par le prof principal -->



    <!-- Bootstrap core JavaScript ======================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./view/js/bootstrap.min.js"></script>
    <script src="./view/jquery/jquery.min.js"></script>
    <script src="./view/js/connecter.js"></script>
    <script src="./view/jqBootstrapValidation.js"></script>
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
