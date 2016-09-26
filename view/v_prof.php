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
            <li><a href="#Note" class="page-scroll">Note</a></li>
            <li><a href="#Devoir" class="page-scroll">Devoir</a></li>
            <li><a href="#AbsEleve" class="page-scroll">Absence d'eleve</a></li>
            <li><a href="#Appreciation" class="page-scroll">Appréciation</a></li>
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
        <div class="intro-text">
          <div class="intro-lead-in">Bienvenue <?php 	echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']);  ?>.<br>
            Grâce à cette page vous allez pouvoir visualiser vos eleve est ainsi leurs fournires toutes les informations utile.Tels que leurs notes ou bien des devoirs a realiser.</div>
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
          <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 text-center">
						<h4>Liste des classe:</h4>
            <select class="form-control">
              <option><?php echo afficherListeClasse () ?></option>
            </select>
						<br>
              <!-- <li>Eleve 1 /20</li>
              <li>Eleve 2 /20</li>
              <li>Eleve 3 /20</li>
              <li>Eleve 4 /20</li> -->


            <form class="form-inline">
              <div class="form-group">
                <label class="sr-only" for="NoteScolaire">Note sur </label>
                <div class="input-group">
                  <div class="input-group-addon">Nom de l'eleve</div>
                  <input type="text" class="form-control" id="NoteScolaire" placeholder="Entrer la note de l'eleve">
                  <div class="input-group-addon">20</div>
                </div>
              </div>
            </form>
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
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 text-center">
            <select class="form-control">
              <option>Liste des classe</option>
            </select>
            <br>
            <textarea class="form-control" rows="3" placeholder="Resume du cours"></textarea><br>
            <textarea class="form-control" rows="3" placeholder="Devoir à faire"></textarea><br>
            <a class="btn btn-success" href="#" role="button">Rajouter le devoir</a>
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
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
              <select class="form-control">
                <option>Liste des classes</option>
              </select>
              <br>
              <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" value="option1">élève 1
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox2" value="option2">élève 2
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox3" value="option3">élève 3
              </label>
              <br><br>
              <a class="btn btn-danger" href="#" role="button">Absent</a>
          </div>
        </div>
        <br>
      </div>
    </section>

    <section id="Appreciation">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Appreciation</h2>
              <h3 class="section-subheading text-muted">Ici, vous allez pouvoir marquer une appréciation au sujet d'un élève de votre choix</h3>
          </div>
          <div class="col-lg-10 col-md-offset-1 text-center">
            <select class="form-control">
              <option>Liste des classes</option>
            </select>
          <select class="form-control">
            <option>Liste des élèves</option>
          </select>
            <textarea class="form-control" rows="3"></textarea><br>
            <a class="btn btn-success" href="#" role="button">Ajouter l'appréciation</a>
          </div>
        </div><br>
      </div>
    </section>


    <!-- Bootstrap core JavaScript ======================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../view/js/bootstrap.min.js"></script>
    <script src="../view/jquery/jquery.min.js"></script>
    <script src="../view/js/connecter.js"></script>
    <script src="../view/jqBootstrapValidation.js"></script>

  </body>
</html>
