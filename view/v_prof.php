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
    <link href="./view/css/bootstrap.css" rel="stylesheet">
    <link  href="./view/css/connecter.css" rel="stylesheet">


    <title>Professeur - iSchool Notes</title>
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
            <!-- <li><a href="#note" class="page-scroll">Note</a></li>
            <li><a href="#devoir" class="page-scroll">Devoir</a></li> -->
            <li><a href="#Note" class="js-scrollTo">Note</a></li>
            <li><a href="#Devoir" class="js-scrollTo">Devoir</a></li>
            <li><a href="#AbsEleve" class="js-scrollTo">Absence d'élève</a></li>
            <li><a href="#Appreciation" class="js-scrollTo">Appréciation</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="contact.php">Contact</a></li> -->
            <li><a href="accueil"><?php echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']); ?>  (Se déconnecter)</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header>
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bienvenue <?php 	echo ucfirst($_SESSION['nom']).' '.ucfirst($_SESSION['prenom']);  ?>.<br>
            Grâce à cette page, vous allez pouvoir visualiser vos élèves et ainsi leur fournir toutes les informations utiles telles que leurs notes ou bien des devoirs à réaliser.</div>
        </div>
      </div>
    </header>

    <section id="Note" class="bg bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Note</h2>
              <h3 class="section-subheading text-muted">Enregistrer ici les notes du dernier contrôle pour transmettre l'information à l'élève.</h3>
          </div>
          <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 text-center">
            <form method="post" id="form_ajout_note">
              <div id="for_matiere_for_note">
                <select class="form-control" name="matiere" id="matiere_for_note">
                  <option value="par_default">Sélectionner une matière</<option>
                  <option value="francais">Français</<option>
                  <option value="histoire">Histoire</<option>
                  <option value="mathematique">Mathématique</<option>
                  <option value="eps">EPS</<option>
                  <option value="sciennce">Science</<option>
                  <option value="anglais">Anglais</<option>
                </select>
              </div>
              <br>
              <div id="for_classe_for_note">
                <select class="form-control" name="classe" id="classe_for_note">
                </select>
              </div>
              <br>
              <div id="for_eleve_for_note">
                <select class="form-control" name="eleve" id="eleve_for_note">
                </select>
              </div>
              <br>
              <div id="for_saisir_note_for_note"></div>
              <br>
              <div id="for_button_for_note">
                <!-- <button class="btn btn-success" id="ajout_note_for_prof">Ajouter la note</button> -->
                <input class="btn btn-success" type="submit" value="Ajouter la note"/>
              </div>
              <br>
              <div id="result_for_send_note">
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
          <form action="prof" method="post">
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 text-center" id="for_matiere_for_note">
              <select class="form-control" name="matiere_for_cours_devoir" id="matiere_for_note">
                <option value="par_default">Sélectionner une matière</<option>
                <option value="francais">Français</<option>
                <option value="histoire">Histoire</<option>
                <option value="mathematique">Mathématique</<option>
                <option value="eps">EPS</<option>
                <option value="sciennce">Science</<option>
                <option value="anglais">Anglais</<option>
              </select>
            </div>
            <br><br>
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 text-center">
              <select class="form-control" name="classe_for_cours_devoir">
                <?php echo afficherListeClasseForProf ();?>
              </select>
              <br>
              <textarea name="cours_for_cours_devoir" class="form-control" rows="3" placeholder="Resume du cours" required></textarea>
              <br>
              <textarea name="devoir_for_cours_devoir" class="form-control" rows="3" placeholder="Devoir à faire"></textarea>
              <br>
              <button class="btn btn-success">Rajouter le devoir</button>
            </div>
          </form>
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
							<h4>Liste des classes:</h4>
	            <select class="form-control">
	              <?php echo afficherListeClasseForProf ();?>
	            </select>
              <br>
              <form action="prof" method="post">
                <div id="eleve_for_absent">
                  <!-- <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1">élève 1
                  </label> -->
                </div>
                <br><br>
                <input type="checkbox" id="inlineCheckbox1" name="validate_abs" value="valider">Confirmer les absence
                <br>
                <button class="btn btn-danger">Valider les absence</button>
              </form>
          </div>
        </div>
        <br>
      </div>
    </section>

    <section id="Appreciation">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
              <h2 class="section-heading">Appréciation</h2>
              <h3 class="section-subheading text-muted">Ici, vous allez pouvoir marquer une appréciation au sujet d'un élève de votre choix</h3>
          </div>
          <div class="col-lg-10 col-md-offset-1 text-center" id="appreciation">
						<h4>Liste des classes:</h4>
	          <select class="form-control" id="liste_for_classe">
	            <?php echo afficherListeClasseForProf ();?>
	          </select>
						<br>
						<form action="prof" method="post" id="for_appreciation">
              <select class="form-control" id="list_eleve_for_apreciation" name="eleve_appreciation">
                <option value="par_default">Liste des élèves</option>
              </select>
              <br>
							<textarea name="appreciation" class="form-control" rows="3"></textarea>
							<br>
							<button class="btn btn-success" type="submit" id="valider_appreciation">Ajouter l'appréciation</button>
						</form>
          </div>
        </div><br>
      </div>
    </section>


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
  </body>
  <!-- Script pour afficher la liste classe pour la parti Note -->
  <script>
		$( "#for_matiere_for_note > select" ).change(function () {
			var for_classe = $('#for_matiere_for_note > select option:selected').val()
			$.ajax({
				url: './model/m_fonctions.php',
				type: 'post',
				data: { 'matiere_for_note': for_classe },
				success: function(response) { $("#classe_for_note" ).html(response);}
			});
		});
	</script>
  <!-- Script pour afficher la liste eleve pour la parti Note -->
  <script>
		$( "#for_classe_for_note > select" ).change(function () {
			var for_eleve = $('#for_classe_for_note > select option:selected').val()
			$.ajax({
				url: './model/m_fonctions.php',
				type: 'post',
				data: { 'eleve_for_note': for_eleve },
				success: function(response) { $("#eleve_for_note" ).html(response);}
			});
		});
	</script>
  <!-- Script pour afficher le champs note pour la parti Note -->
  <script>
		$( "#for_eleve_for_note > select" ).change(function () {
			var for_number = $('#for_eleve_for_note > select option:selected').val()
      $.ajax({
        url: './model/m_fonctions.php',
        type: 'post',
        data: { 'input_number_for_note': for_number },
        success: function(response) { $("#for_saisir_note_for_note" ).html(response);}
      });
		});
	</script>
  <!-- Script pour envoyer la note de l'eleve dans la BDD (parti note) -->
  <!-- <script>
    $( "#for_eleve_for_note > select" ).change(function () {
      var eleve = $('#for_eleve_for_note > select option:selected').val()
    });
    $( "#for_matiere_for_note > select" ).change(function () {
      var matiere = $('#for_matiere_for_note > select option:selected').val()
    });
    $( "#for_classe_for_note > select" ).change(function () {
      var classe = $('#for_classe_for_note > select option:selected').val()
    });
    $( "#form_ajout_note" ).submit(function (event) {
      event.preventDefault();
      // var eleve = $('#eleve_for_part_note').val()
      // var matiere = $('#matiere_for_part_note').val()
      // var classe = $('#classe_for_part_note').val()
      var note = $('#note_for_note').val()
      $.ajax({
        url: './model/m_fonctions.php',
        type: 'post',
        data: {
          'matiere_for_part_note': matiere,
          'classe_for_part_note': classe,
          'eleve_for_part_note': eleve,
          'note_for_part_note': note
        },
        success: function(response) { $("#result_for_send_note" ).html(response);}
      });
    });
  </script> -->
	<!-- Script pour affichage de la liste pour la parti Appreciation -->
	<script>
		$( "#appreciation > #liste_for_classe" ).change(function () {
			var classe = $('#appreciation > #liste_for_classe option:selected').val()
			$.ajax({
				url: './model/m_fonctions.php',
				type: 'post',
				data: { 'classe_appreciation': classe },
				success: function(response) { $( "#list_eleve_for_apreciation" ).html('<option value="par_default">Selectionner un élève</option>' + response);}
			});
		});
	</script>
</html>
