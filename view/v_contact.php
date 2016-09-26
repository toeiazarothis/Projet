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
    <link  href="../view/css/cover.css" rel="stylesheet">


    <title>Prise de contact</title>
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SchoolNotes</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="v_index.php">Accueil</a></li>
                  <li class="active"><a href="v_contact.php">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact</h2>
                <h3>Grâce à ce formulaire vous allez pouvoir nous contacter et avoir une réponse dans les plus brefs délais.</h3>
            </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                  <form name="sentMessage" id="contactForm" novalidate>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Indiquer votre nom *" id="name" required data-validation-required-message="Veuillez nous indiquez votre Nom ( ça sera plus simple pour parler ensemble).">
                                  <p class="help-block text-danger"></p>
                              </div>
                              <div class="form-group">
                                  <input type="email" class="form-control" placeholder="Votre adresse mail *" id="email" required data-validation-required-message="Veuillez entrer votre adresse mail. Sinon ça risque d'etre dur de vous repondre.">
                                  <p class="help-block text-danger"></p>
                              </div>
                              <div class="form-group">
                                  <input type="tel" class="form-control" placeholder="Votre numero de telephone *" id="phone" required data-validation-required-message="Veuillez entrer votre Numero pour vous recontacter.">
                                  <p class="help-block text-danger"></p>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <textarea class="form-control" placeholder="Votre message *" id="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                                  <p class="help-block text-danger"></p>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-4 col-md-offset-2 text-center">
                              <div id="success"></div>
                              <button type="reset" class="btn btn-lg btn-default">Effacer votre Message</button>
                          </div>
                          <div class="col-md-4 text-center">
                            <button type="submit" class="btn btn-lg btn-default">Envoyer votre Message</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>  </body>
</html>
