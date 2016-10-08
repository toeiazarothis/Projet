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
    <link rel="shortcut icon" href="./view/img/stylo.ico">
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="Petit site des familles" />
    <meta property="og:image" content="image a mettre" />

    <!-- Link -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="./view/css/bootstrap.css" rel="stylesheet">
    <link  href="./view/css/connecter.css" rel="stylesheet">


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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Éleve <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#ajoutEleve" class="js-scrollTo">Ajout</a></li>
                <li><a href="#majEleve" class="js-scrollTo">Mise à jour</a></li>
                <li><a href="#deleteEleve" class="js-scrollTo">Suppression</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Prof <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#ajoutProf" class="js-scrollTo">Ajout</a></li>
                <li><a href="#majProf" class="js-scrollTo">Mise à jour</a></li>
                <li><a href="#deleteProf" class="js-scrollTo">Suppression</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Membre du personnel<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#ajoutPersonnel" class="js-scrollTo">Ajout</a></li>
                <li><a href="#majPersonnel" class="js-scrollTo">Mise à jour</a></li>
                <li><a href="#deletePersonnel" class="js-scrollTo">Suppression</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Classe<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#ajoutClasse" class="js-scrollTo">Ajout</a></li>
                <li><a href="#majClasse" class="js-scrollTo">Mise à jour</a></li>
                <li><a href="#deleteClasse" class="js-scrollTo">Suppression</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="accueil"><?php echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']); ?>  (Se déconnecter  <i class="fa fa-power-off" aria-hidden="true"></i>)</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!--Debut section eleve -->
    <section id="eleve">

      <!-- Ajout de l'eleve -->
      <section id="ajoutEleve">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Ajout d'élève</h2>
              <h3 class="section-subheading text-muted">Rajouter un élève</h3>
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-6 col-md-offset-4 text-center">
              <div class="form-group">
                <label class="sr-only" for="nomDeFamille">Nom de famille de l'élève</label>
                  <div class="input-group">
                    <div class="input-group-addon">Nom de famille</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer un nom">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Prenom de l'élève</label>
                  <div class="input-group">
                    <div class="input-group-addon">Prenom</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer un prenom">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Classe de l'élève</label>
                  <div class="input-group">
                    <div class="input-group-addon">Classe</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer la classe de l'élève">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Nom d'un parent</label>
                  <div class="input-group">
                    <div class="input-group-addon">Nom d'un parent</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer le nom d'un parent">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Prenom du parent</label>
                  <div class="input-group">
                    <div class="input-group-addon">Prenom du parent</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer le prenom du parent">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Adresse du domicile</label>
                  <div class="input-group">
                    <div class="input-group-addon">Adresse</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">E-mail</label>
                  <div class="input-group">
                    <div class="input-group-addon">Courriel du parent</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse courriel du parent">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Numero de telephone</label>
                  <div class="input-group">
                    <div class="input-group-addon">Numero de telephone</div>
                    <input type="number" class="form-control" id="exampleInputAmount" placeholder="Entrer le numero de telephone du parent">
                  </div><br>
                  <div class="row">
                      <input class="btn btn-warning" type="button" name="name" value="Effacer">
                      <input class="btn btn-success" type="submit" name="submit" value="Ajouter un eleve !">
                  </div>
              </div>
            </div>
          </div>
          <!-- Fin du formulaire -->
        </div>
      </section>
      <!-- Fin ajout d'un eleve -->
      <!-- Mettre a jour un eleve -->
      <section id="majEleve">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Mise a jour d'élèves  </h2>
              <h3 class="section-subheading text-muted">Mettre a jour le profil d'un élève</h3>
            </div>
          </div>
          <!-- Menu deroulant liste des eleve -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <select class="form-control">
                <option>Liste des eleves</option>
              </select>
            </div>
          </div><br>
          <!-- Fin du menu deroulant -->
          <div class="row">
            <div class="col-xs-10 col-xs-offset-1 text-center">
              <input class="btn btn-success"type="submit" name="submit" value="Modifier un eleve !">
            </div>
          </div>
        </div>
      </section>
      <!-- Fin de la mise a jour d'un eleve -->
      <!-- Debut menu supprimer un eleve -->
      <section id="deleteEleve">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Suppresion d'élève </h2>
              <h3 class="section-subheading text-muted">Supprimer un élève</h3>
            </div>
          </div>
          <!-- Menu deroulant liste des eleve -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <select class="form-control">
                <option>Liste des eleves</option>
              </select>
            </div>
          </div><br>
          <!-- Fin du menu deroulant -->
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <input class="btn btn-danger"type="submit" name="submit" value="Supprimer l'eleve !">
            </div>
          </div>
        </div>
      </section>
      <!-- Fin du menu supprimer un eleve -->
    </section>


    <!--Debut section prof -->
    <section id="prof" class="bg bg-light-gray">
      <!-- Ajout de professeur -->
      <section id="ajoutProf">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Ajout de professeur</h2>
              <h3 class="section-subheading text-muted">Rajouter un professeur</h3>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <div class="form-group">
                <label class="sr-only" for="exampleInputAmount">Nom du professeur</label>
                <div class="input-group">
                  <div class="input-group-addon">Nom</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale">
                </div>
                <label class="sr-only" for="exampleInputAmount">Prenom du professeur</label>
                <div class="input-group">
                  <div class="input-group-addon">Prenom</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale">
                </div>
                <label class="sr-only" for="exampleInputAmount">classe que gère le professeur</label>
                <div class="input-group">
                  <div class="input-group-addon">Classe</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale">
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Fin du menu ajout de professeur -->
        <!-- Menu mise a jour de professeur -->
        <section id="majProf">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Mise a jour prof </h2>
                <h3 class="section-subheading text-muted">Mettre a jour un membre de l'equipe enseignante</h3>
              </div>
            </div>
            <!-- Liste deroulante des different professeur -->
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
                <select class="form-control">
                  <option>Liste des professeur</option>
                </select>
              </div>
            </div>
            <!-- Fin de la liste deroulante -->
            <br>
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <input class="btn btn-success"type="submit" name="submit" value="Modifier un professeur!">
              </div>
            </div>
          </div>
        </section>
        <!-- Fin du menu mettre a jour un professeur  -->
        <!-- Menu supprimer un professeur -->
        <section id="deleteProf">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Suppresion prof </h2>
                <h3 class="section-subheading text-muted">Supprimer un Professeur</h3>
              </div>
            </div>
            <!-- Liste deroulante des different professeur -->
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
                <select class="form-control">
                  <option>Liste des professeur</option>
                </select>
              </div>
            </div>
            <!-- Fin de la liste deroulante -->
            <br>
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <input class="btn btn-danger"type="submit" name="submit" value="Supprimer le professeur !">
              </div>
            </div>
          </div>
        </section>
        <!-- Fin du menu supprimer un professeur  -->
      </section>
      <!-- Fin de la parti professeur -->


    <!--Debut section personnel -->
      <section id="personnel">
        <section id="ajoutPersonnel">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Ajout </h2>
                <h3 class="section-subheading text-muted">Rajouter un membre du personnel</h3>
              </div>
            </div>
          </div>
        </section>
        <section id="majPersonnel">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Mise à jour du personnel </h2>
                <h3 class="section-subheading text-muted">Mettre à jour un membre du personnel</h3>
                <select class="form-control col-md-6">
                  <option>Liste des membres du personnel</option>
                </select>
                <input class="btn btn-success"type="submit" name="submit" value="Modifier le membre du personnel">
              </div>
            </div>
          </div>
        </section>
        <section id="deletePersonnel">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Suppresion du personnel </h2>
                <h3 class="section-subheading text-muted">Supprimer un membre du personnel</h3>
                <select class="form-control col-md-6">
                  <option>Liste des membres du personnel</option>
                </select>
                <input class="btn btn-danger"type="submit" name="submit" value="Supprimer le membre du personnel !">
              </div>
            </div>
          </div>
        </section>
      </section>
      <!--Fin section personnel -->

      <!--Debut section classe -->
      <section id="classe" class="bg bg-light-gray">
        <section id="ajoutClasse">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Ajout d'une classe</h2>
                <h3 class="section-subheading text-muted">Rajouter une classe</h3>
              </div>
            </div><br>

            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
              <div class="form-group">
                <label class="sr-only" for="exampleInputAmount">classe à rajouter</label>
                <div class="input-group">
                  <div class="input-group-addon">Classe</div>
                  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postal">
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="majClasse">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Modification d'une classe </h2>
                <h3 class="section-subheading text-muted">Mettez a jour le nom d'une classe</h3>
                <select class="form-control col-md-6">
                  <option>Liste des classes</option>
                </select>
                <input class="btn btn-success"type="submit" name="submit" value="Modifier la classe">
              </div>
            </div>
          </div>
        </section>
        <section id="deleteClasse">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Suppresion d'une classe</h2>
                <h3 class="section-subheading text-muted">Supprimer la classe</h3>
                <select class="form-control col-md-6">
                  <option>Liste des classes</option>
                </select>
                <input class="btn btn-danger" type="submit" name="submit" value="Supprimer la classe">
              </div>
            </div>
          </div>
        </section>
      </section>
      <!--Fin section classe -->



      <!-- Bootstrap core JavaScript ======================================== -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="./view/js/bootstrap.min.js"></script>
      <script src="./view/jquery/jquery.min.js"></script>
      <!-- Effet de scroll -->
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
      <!-- Fin effet de scroll -->
    </body>
  </html>
