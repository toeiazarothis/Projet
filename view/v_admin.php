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


    <title>Vie Scolaire - iSchool Notes</title>
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
            <li><a href="#ajoutEleve" class="page-scroll">ajout de eleve</a></li>
            <li><a href="#ajoutProf" class="page-scroll">ajout de prof</a></li>
            <li><a href="#ajoutClasse" class="page-scroll">ajout de classe</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="c_admin.php">Administration</a></li>
            <li><a href="c_index.php">Déconnexion</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


      <section id="ajoutEleve">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Ajout d'élève</h2>
              <h3 class="section-subheading text-muted">Rajouter un élève</h3>
            </div>
          </div>

          <div class="row">
                <div class="form-group">
                  <label class="sr-only" for="nomDeFamille">Nom de famille de l'eleve</label>
                  <div class="input-group">
                    <div class="input-group-addon">Nom de famille</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer un nom">
                  </div>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputAmount">Prenom de l'eleve</label>
                  <div class="input-group">
                    <div class="input-group-addon">Prenom</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer un prenom">
                  </div>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputAmount">Classe de l'eleve</label>
                  <div class="input-group">
                    <div class="input-group-addon">Classe</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer la classe de l'eleve">
                  </div>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputAmount">Adresse de l'eleve</label>
                  <div class="input-group">
                    <div class="input-group-addon">Adresse</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postal">
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>

    <section id="ajoutProf" class="bg bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Ajout de professeur</h2>
            <h3 class="section-subheading text-muted">Rajouter un prof</h3>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Nom du prof</label>
            <div class="input-group">
              <div class="input-group-addon">Nom</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postal">
            </div>
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Prenom du prof</label>
            <div class="input-group">
              <div class="input-group-addon">Prenom</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postal">
            </div>
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">classe que gere le prof</label>
            <div class="input-group">
              <div class="input-group-addon">Classe</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postal">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="ajoutClasse">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h2 class="section-heading">Ajout dune classe</h2>
            <h3 class="section-subheading text-muted">Rajouter une classe</h3>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">classe a rajouter</label>
            <div class="input-group">
              <div class="input-group-addon">Classe</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postal">
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
