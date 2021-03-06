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
                <!-- <li><a href="#majClasse" class="js-scrollTo">Mise à jour</a></li> -->
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
            <div class="col-md-6 col-md-offset-3">
              <div class="well bs-component">
                <form class="form-horizontal">
                  <fieldset>
                    <legend>Legend</legend>
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                      <div class="col-lg-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Checkbox
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Radios</label>
                      <div class="col-lg-10">
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                            Option one is this
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Option two can be something else
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="select" class="col-lg-2 control-label">Selects</label>
                      <div class="col-lg-10">
                        <select class="form-control" id="select">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                        <br>
                        <select multiple="" class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12 text-center">
              <form action="admin" method="post">
                <div class="form-horizontal">
                  <label class="sr-only" for="nomDeFamille">Nom de famille de l'élève</label>
                    <div class="input-group">
                      <div class="input-group-addon">Nom de famille</div>
                      <input type="text" name="nom_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer un nom" required>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Prénom de l'élève</label>
                    <div class="input-group">
                      <div class="input-group-addon">Prenom</div>
                      <input type="text" name="prenom_eleve" class="form-control" id="exampleInputAmount" placeholder="Entrer un prenom" required>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Classe de l'élève</label>
                    <div class="input-group">
                      <div class="input-group-addon">Classe</div>
                      <select class="form-control" name="classe_eleve"><?php echo showListAllClassForAdmin (); ?></select>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Nom d'un parent</label>
                    <div class="input-group">
                      <div class="input-group-addon">Nom d'un parent</div>
                      <input type="text" name="nom_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le nom d'un parent" required>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Prénom du parent</label>
                    <div class="input-group">
                      <div class="input-group-addon">Prénom du parent</div>
                      <input type="text" name="prenom_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le prenom du parent" required>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Adresse du domicile</label>
                    <div class="input-group">
                      <div class="input-group-addon">Adresse</div>
                      <input type="text" name="adresse_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale" required>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">E-mail</label>
                    <div class="input-group">
                      <div class="input-group-addon">Courriel du parent</div>
                      <input type="email" name="email_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse courriel du parent" required>
                    </div>
                    <label class="sr-only" for="exampleInputAmount">Numéro de téléphone</label>
                    <div class="input-group">
                      <div class="input-group-addon">Numéro de téléphone</div>
                      <input type="tel" name="tel_parent" class="form-control" id="exampleInputAmount" placeholder="Entrer le numero de telephone du parent" required>
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
              <h2 class="section-heading">Mise à jour d'élèves  </h2>
              <h3 class="section-subheading text-muted">Mettre à jour le profil d'un élève</h3>
            </div>
          </div>
          <!-- Menu deroulant liste des eleve -->
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center" id="list_classe_for_maj">
              <h4>Liste des classes</h4>
              <select class="form-control"><?php echo showListAllClassForAdmin (); ?></select>
            </div>
            <div class="col-md-6 col-md-offset-3 text-center" id="for_list_eleve_for_maj">
              <h4>Liste des élèves</h4>
              <select class="form-control" id="list_eleve_for_maj"></select>
              <br>
            </div>
            <div class="col-md-4 col-md-offset-4 col-xs-12 text-center" id="formulaire_eleve_for_maj">
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
              <h3 class="section-subheading text-muted">Ajouter un professeur</h3>
            </div>
          </div><br>
          <div class="row">
            <form action="admin" method="post">
              <div class="col-md-6 col-md-offset-3 text-center">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputAmount">Nom du professeur</label>
                  <div class="input-group">
                    <div class="input-group-addon">Nom</div>
                    <input type="text" class="form-control" name="nom_prof" id="exampleInputAmount" placeholder="Entrer le nom" required>
                  </div>
                  <label class="sr-only" for="exampleInputAmount">Prénom du professeur</label>
                  <div class="input-group">
                    <div class="input-group-addon">Prenom</div>
                    <input type="text" class="form-control" name="prenom_prof" id="exampleInputAmount" placeholder="Entrer le prénom" required>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon">Téléphone</div>
                    <input type="tel" class="form-control" name="tel_prof" id="exampleInputAmount" placeholder="Entrer le numéro de téléphone" required>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon">Adresse</div>
                    <input type="text" class="form-control" name="adresse_prof" id="exampleInputAmount" placeholder="Entrer l'adresse postal" required>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon">Email</div>
                    <input type="text" class="form-control" name="email_prof" id="exampleInputAmount" placeholder="Entrer l'email" required>
                  </div>
                  <label class="sr-only" for="exampleInputAmount">La matiére du professeur</label>
                  <div class="input-group">
                    <div class="input-group-addon">Matière n°1</div>
                    <!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale"> -->
                    <select class="form-control" name="matiere_1_prof" id="matiere_for_note">
                      <option value="aucune">Sélectionner une matière</<option>
                      <option value="francais">Français</<option>
                      <option value="histoire">Histoire</<option>
                      <option value="mathematique">Mathématique</<option>
                      <option value="eps">EPS</<option>
                      <option value="science">Science</<option>
                      <option value="anglais">Anglais</<option>
                    </select>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon">Matière n°2</div>
                    <!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale"> -->
                    <select class="form-control" name="matiere_2_prof" id="matiere_for_note">
                      <option value="aucune">Sélectionner une matière</<option>
                      <option value="francais">Français</<option>
                      <option value="histoire">Histoire</<option>
                      <option value="mathematique">Mathématique</<option>
                      <option value="eps">EPS</<option>
                      <option value="science">Science</<option>
                      <option value="anglais">Anglais</<option>
                    </select>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon">Matière n°3</div>
                    <!-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Entrer l'adresse postale"> -->
                    <select class="form-control" name="matiere_3_prof" id="matiere_for_note">
                      <option value="aucune">Sélectionner une matière</<option>
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
                <h2 class="section-heading">Mise à jour prof </h2>
                <h3 class="section-subheading text-muted">Mettre à jour un membre de l'équipe enseignante</h3>
              </div>
            </div>
            <!-- Liste deroulante des different professeur -->
            <form action="admin" method="post">
              <div class="col-md-6 col-md-offset-3 text-center">
                <div class="row">
                  <div class="input-group" id="for_prof_selected">
                    <div class="input-group-addon">Professeur</div>
                    <select class="form-control" name="prof_selected"><?php echo showListProfForAdmin (); ?></select>
                  </div>
                  <div id="formulaire_for_modify_prof">

                  </div>
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
                <h2 class="section-heading">Ajout d'un membre du personnel</h2>
                <h3 class="section-subheading text-muted">Ajouter un membre du personnel</h3>
              </div>
            </div><br>
            <form action="admin" method="post">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12 text-center">
                  <div class="form-horizontal">
                    <div class="input-group">
                      <div class="input-group-addon">Nom</div>
                      <input type="text" name="nom_member" class="form-control" id="exampleInputAmount" placeholder="Entrer un nom" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-addon">Prénom</div>
                      <input type="text" name="prenom_member" class="form-control" id="exampleInputAmount" placeholder="Entrer un prenom" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-addon">Niveau d'Administration</div>
                      <select class="form-control" name="niveau_d_admin">
                        <option value="0">Pas accès au panel d'Administration</option>
                        <option value="1">Accès limité au panel d'Administration</option>
                        <option value="2">Accès total au panel d'Administration</option>
                      </select>
                    </div>
                    <div class="input-group">
                      <div class="input-group-addon">Adresse</div>
                      <input type="text" name="adresse_member" class="form-control" id="exampleInputAmount" placeholder="Entrer une adresse postal" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-addon">Email</div>
                      <input type="text" name="email_member" class="form-control" id="exampleInputAmount" placeholder="Entrer un email" required>
                    </div>
                    <div class="input-group">
                      <div class="input-group-addon">Téléphone</div>
                      <input type="tel" name="tel_member" class="form-control" id="exampleInputAmount" placeholder="Entrer un numéro de téléphone" required>
                    </div><br>
                    <div class="row">
                      <div class="col-xs-6 col-xs-offset-3">
                        <button class="btn btn-success">Ajouter le membre du personnel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>
        <section id="majPersonnel">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1 text-center">
                <h2 class="section-heading">Mise à jour du personnel </h2>
                <h3 class="section-subheading text-muted">Mettre à jour un membre du personnel</h3>
                <br>
                <form action="admin" method="post">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-12 text-center">
                      <div class="form-horizontal">
                        <div class="input-group">
                          <div class="input-group-addon">Membre</div>
                          <select class="form-control col-md-6" name="list_member_for_modify">
                            <?php echo showListMemberForAdmin (); ?>
                          </select><br>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">Niveau d'Administration</div>
                          <select class="form-control" name="niveau_d_admin_for_modify">
                            <option value="0">Pas accès au panel d'Administration</option>
                            <option value="1">Accès limité au panel d'Administration</option>
                            <option value="2">Accès total au panel d'Administration</option>
                          </select>
                        </div><br>
                        <div class="row">
                          <div class="col-xs-6 col-xs-offset-3">
                            <button class="btn btn-success">Modifier le membre du personnel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
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
              </div>
              <div class="col-md-6 col-md-offset-3 text-center">
                <form action="admin" method="post">
                  <select class="form-control col-md-6" name="list_member_for_del">
                    <?php echo showListMemberForAdmin (); ?>
                  </select>
                  <br><br>
                  <input type="checkbox" name="confim_del_member" value="yes"> Confirmer la suppression du membre du personnel</input>
                  <br><br>
                  <button class="btn btn-danger">Supprimer le membre du personnel !</button>
                </form>
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
                <h3 class="section-subheading text-muted">Ajouter une classe</h3>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
                <form action="admin" method="post">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">Classe à ajouter</label>
                    <div class="input-group">
                      <div class="input-group-addon">Classe</div>
                      <input type="text" class="form-control" id="exampleInputAmount" name="nom_classe" placeholder="Entrer la classe" required>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                      <button class="btn btn-success">Ajouter la classe</button>
                    </div>
                  </div>
                </form>
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
                <br>
              </div>
              <div class="col-md-6 col-md-offset-3 text-center">
                <form action="admin" method="post">
                  <select class="form-control col-md-6" name="classe_select_for_del">
                    <?php echo showListAllClassForAdmin(); ?>
                  </select>
                  <br><br>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                      <input type="checkbox" name="del_classe" value="yes"> Confirmer la suppression de la classe</input>
                      <br><br>
                      <button class="btn btn-danger">Supprimer le classe !</button>
                    </div>
                  </div>
                </form>
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
      <!-- Script pour afficher la liste eleve pour la partie MAJ Eleve -->
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
      <!-- Script pour afficher le formulaire pour la parti maj Prof  -->
      <script>
        $( "#for_prof_selected > select" ).change(function () {
          var prof = $('#for_prof_selected > select option:selected').val()
          $.ajax({
            url: './model/m_fonctions.php',
            type: 'post',
            data: { 'formulaire_for_modify_prof': prof },
            success: function(response) { $("#formulaire_for_modify_prof" ).html(response);}
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
