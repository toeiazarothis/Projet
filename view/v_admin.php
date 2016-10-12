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
    <link href="./view/css/connecter.css" rel="stylesheet">
    <!-- <link href="./view/css/formulaire.css" rel="stylesheet"> -->


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
            <div class="col-md-6 col-md-offset-3 col-xs-12 text-center">
              <form action="admin" method="post">
                <div class="form-horizontal">
                  <label class="sr-only" for="nomDeFamille">Nom de famille de l'élève</label>
                    <div class="input-group">
                      <div class="input-group-addon">Nom de famille</div>
                      <input type="text" name="nom_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer un nom">
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Prenom de l'élève</label>
                    <div class="input-group">
                      <div class="input-group-addon">Prenom</div>
                      <input type="text" name="prenom_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer un prenom">
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Classe de l'élève</label>
                    <div class="input-group">
                      <div class="input-group-addon">Classe</div>
                      <select class="form-control" name="classe_eleve">
                        <?php echo showListAllClassForAdmin (); ?>
                      </select>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Nom d'un parent</label>
                    <div class="input-group">
                      <div class="input-group-addon">Nom d'un parent</div>
                      <input type="text" name="nom_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le nom d'un parent">
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Prenom du parent</label>
                    <div class="input-group">
                      <div class="input-group-addon">Prenom du parent</div>
                      <input type="text" name="prenom_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le prenom du parent">
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Adresse du domicile</label>
                    <div class="input-group">
                      <div class="input-group-addon">Adresse</div>
                      <input type="text" name="adresse_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale">
                    </div>
                    <label class="sr-only" for="exampleInputAmount">E-mail</label>
                    <div class="input-group">
                      <div class="input-group-addon">Courriel du parent</div>
                      <input type="email" name="email_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse courriel du parent">
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Numero de telephone</label>
                    <div class="input-group">
                      <div class="input-group-addon">Numero de telephone</div>
                      <input type="tel" name="tel_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le numero de telephone du parent">
                    </div><br>
                    <div class="row">
                      <div class="col-xs-6 col-xs-offset-3">
                        <button class="btn btn-success">Ajouter l'élève</button>
                      </div>
                        <!-- <input class="btn btn-warning" type="button" value="Effacer"> -->
                    </div>
                </div>
              </form>
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
            <div class="col-md-6 col-md-offset-3 text-center" id="list_classe_for_maj">
              <h4>Liste des classes</h4>
              <select class="form-control">
                <?php echo showListAllClassForAdmin(); ?>
              </select>
            </div>
            <div class="col-md-6 col-md-offset-3 text-center" id="for_list_eleve_for_maj">
              <h4>Liste des élèves</h4>
              <select class="form-control" id="list_eleve_for_maj">
              </select>
              <br><br>
            </div>
            <div class="col-md-6 col-md-offset-4 col-xs-12 text-center" id="formulaire_eleve_for_maj">
            </div>
          </div><br>
          <!-- Fin du menu deroulant -->
        </div>
      </section>
      <!-- Fin de la mise a jour d'un eleve -->
      <!-- Debut menu supprimer un eleve -->
      <section id="deleteEleve">
        <div class="container">
          <form class="" action="admin" method="post">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Suppresion d'élève </h2>
                <h3 class="section-subheading text-muted">Supprimer un élève</h3>
              </div>
            </div>
            <!-- Menu deroulant liste des eleve -->
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center" id="list_classe_for_del">
                <h4>Liste des classes</h4>
                <select class="form-control" name="classe_for_del_eleve">
                  <?php echo showListAllClassForAdmin(); ?>
                </select>
              </div>
              <div class="col-md-6 col-md-offset-3 text-center">
                <h4>Liste des élèves</h4>
                <select class="form-control" name="eleve_for_del_eleve" id="list_eleve_for_del">
                </select>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <input type="checkbox" name="confirm_del_eleve" value="yes"> Confirmer la suppression de l'élève</input>
                <br><br>
                <button class="btn btn-danger">Supprimer l'eleve !</button>
              </div>
            </div>
          </form>
          <!-- Fin du menu deroulant -->
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
            <form action="admin" method="post">
              <div class="col-md-6 col-md-offset-3 text-center">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputAmount">Nom du professeur</label>
                  <div class="input-group">
                    <div class="input-group-addon">Nom</div>
                    <input type="text" class="form-control" name="nom_prof" id="exampleInputAmount" placeholder="Entrer le nom">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Prenom du professeur</label>
                  <div class="input-group">
                    <div class="input-group-addon">Prenom</div>
                    <input type="text" class="form-control" name="prenom_prof" id="exampleInputAmount" placeholder="Entrer le prénom">
                  </div>
                  <label class="sr-only" for="exampleInputAmount">la matiere du professeur</label>
                  <div class="input-group">
                    <div class="input-group-addon">Matière</div>
                    <!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale"> -->
                    <select class="form-control" name="matiere_prof" id="matiere_for_note">
                      <option value="par_default">Sélectionner une matière</<option>
                      <option value="francais">Français</<option>
                      <option value="histoire">Histoire</<option>
                      <option value="mathematique">Mathématique</<option>
                      <option value="eps">EPS</<option>
                      <option value="science">Science</<option>
                      <option value="anglais">Anglais</<option>
                    </select>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      <button class="btn btn-success">Ajouter le professeur</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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
            <form action="admin" method="post">
              <div class="col-md-6 col-md-offset-3 text-center">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="input-group">
                      <div class="input-group-addon">Professeur</div>
                      <select class="form-control" name="prof_selected">
                        <?php echo showListProfForAdmin (); ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-addon">Matière</div>
                  <!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale"> -->
                  <select class="form-control" name="matiere_prof" id="matiere_for_note">
                    <option value="par_default">Sélectionner une matière</<option>
                    <option value="francais">Français</<option>
                    <option value="histoire">Histoire</<option>
                    <option value="mathematique">Mathématique</<option>
                    <option value="eps">EPS</<option>
                    <option value="science">Science</<option>
                    <option value="anglais">Anglais</<option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                  <br>
                  <button class="btn btn-success">Modifier un professeur!</button>
                </div>
              </div>
            </form>
            <!-- Fin de la liste deroulante -->
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
            <form action="admin" method="post">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <h4>Liste des professeurs</h4>
                  <select class="form-control" name="prof_for_del">
                    <?php echo showListProfForAdmin (); ?>
                  </select>
                </div>
              </div>
              <!-- Fin de la liste deroulante -->
              <br>
              <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                  <input type="checkbox" name="del_prof" value="yes"> Confirmer la suppression du professeurs</input>
                  <br><br>
                  <button class="btn btn-danger">Supprimer le professeur !</button>
                </div>
              </div>
            </form>
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
      <!-- Script pour afficher la liste eleve pour la parti MAJ Eleve -->
      <script>
    		$( "#list_classe_for_maj > select" ).change(function () {
    			var classe = $('#list_classe_for_maj > select option:selected').val()
    			$.ajax({
    				url: './model/m_fonctions.php',
    				type: 'post',
    				data: { 'list_eleve_for_maj': classe },
    				success: function(response) { $("#list_eleve_for_maj" ).html(response);}
    			});
    		});
    	</script>
      <!-- Script pour afficher le formulaire pour la parti maj Eleve -->
      <script>
        $( "#for_list_eleve_for_maj > select" ).change(function () {
          var eleve = $('#for_list_eleve_for_maj > select option:selected').val()
          $.ajax({
            url: './model/m_fonctions.php',
            type: 'post',
            data: { 'formulaire_eleve_for_maj': eleve },
            success: function(response) { $("#formulaire_eleve_for_maj" ).html(response);}
          });
        });
      </script>
      <!-- Script pour afficher la liste eleve pour la parti DEL Eleve -->
      <script>
    		$( "#list_classe_for_del > select" ).change(function () {
    			var classe = $('#list_classe_for_del > select option:selected').val()
    			$.ajax({
    				url: './model/m_fonctions.php',
    				type: 'post',
    				data: { 'list_eleve_for_del': classe },
    				success: function(response) { $("#list_eleve_for_del" ).html(response);}
    			});
    		});
    	</script>
    </body>
  </html>
