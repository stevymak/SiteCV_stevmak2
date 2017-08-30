<?php require 'admin_sitecv/connexion/connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <?php
    $sql = $pdocv->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='1'");
    $ligne = $sql->fetch();
     ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site Cv - <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" href="css/jquery.lineProgressbar.css">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />


</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom" style="background-color:#196DFE;">
        <div class="container">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><?php echo $ligne['prenom'].' '.$ligne['nom']; ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#experience">Experiences</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#competence">Compétences</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#formation">Formations</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#loisir">Loisirs</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Me Contacter</a>
                    </li>
                    <li class="page-scroll" style="opacity:0.1;">
                        <a href="http://smakouezi.ma6tvacoder.org/admin_sitecv/admin/auth.php">Admin</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <header style="background-color:#0044E3;">
        <?php
        $sql = $pdocv->query("SELECT * FROM t_titres_cv WHERE utilisateur_id = '1'");
        $ligne_accroche = $sql->fetch();
        ?>
        <div class="container" id="maincontent" tabindex="-1" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <h1 class="name animated fadeInLeft"><?php echo $ligne['prenom'].' '.$ligne['nom']; ?></h1>
                        <hr class="star-light1 animated fadeInLeft">
                        <span class="animated fadeInDown skills"><?php echo $ligne_accroche['titre_cv']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="experience">
            <?php
            $sql = $pdocv->query("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
            // $ligne_experience = $sql->fetch();
            ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="animated fadeInDown" style="color:#2c3e50;">Expériences</h2>
                </div>
            </div>

            <br>
            <br>
            <br>

            <div class="containere">
                    <?php while ($experience = $sql->fetch()) { ?>
              <article>
                <div class="enjoy-css">
                  <span class="date">
                    <?php echo $experience['dates_e']; ?>
                  </span>
                  <h2><?php echo $experience['titre_e']; ?></h2>
                  <p><?php echo $experience['description_e']; ?></p>
                </div>
              </article>
          <?php } ?>
            </div>

    </section>

    <div class="clear"></div>

    <br>
    <br>
    <br>

    <section id="competence" style="background-color:#0044e3;color:white;">
        <?php
        $sql = $pdocv->query("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
        // $ligne_competence = $sql->fetch();
        ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="animated fadeInDown">Compétences</h2>
                </div>
            </div>
            <br>
            <div class="containerc">
            <?php
            $pourcent = $sql->fetchAll();
            // var_dump($pourcent);
            for($i=0; $i < count($pourcent) ; $i++) {?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 pourcents">
                        <h4><?php echo $pourcent[$i]['competence']; ?></h4>
                        <div stevy="<?php echo $pourcent[$i]['pourcentage'];?>"  class="progressbar" id="progressbar<?= $i ?>" ></div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </section>



    <section id="formation">
        <?php
        $sql = $pdocv->query("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
        // $ligne_formation = $sql->fetch();
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Formations</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <?php while ($formation = $sql->fetch()) { ?>
                <div class="enjoy-css2">
                    <span class="date"><?php echo $formation['date_f']; ?></span>
                    <h3><?php echo $formation['titre_f']; ?></h3>
                    <p><?php echo $formation['description_f']; ?></p>
                </div>
            <div class="clear"></div>
            <br>
            <?php } ?>
        </div>
    </section>

    <section class="success" id="loisir" style="background-color:#0044e3;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Loisirs</h2>
                    <hr class="star-light1">
                    <br>
                </div>
                <div style="margin-left:480px;" class="text-center container-fluid bloc1 pull-left">
                    <?php
                    $sql = $pdocv->query("SELECT * FROM t_loisirs WHERE id_loisir = '6'");
                    $ligne_loisir = $sql->fetch();
                    ?>
                    <h4><?php echo $ligne_loisir['loisir']; ?></h4>
                    <br>
                    <div class="sticker example-1">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Me Contacter</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Nom & Prénom</label>
                                <input type="text" class="form-control" placeholder="Nom & Prénom" id="name" required data-validation-required-message="Veuillez remplir le champ">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Adresse Mail</label>
                                <input type="email" class="form-control" placeholder="Adresse mail" id="email" required data-validation-required-message="Veuillez remplir le champ">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Numéro de Télephone</label>
                                <input type="tel" class="form-control" placeholder="Numéro de telephone" id="phone" required data-validation-required-message="Veuillez remplir le champ">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez remplir le champ"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" style="background-color:#0044E3;" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="footer-above">
        </div>
    </footer>

    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/sticker.js" type="text/javascript"></script>

    <script type="text/javascript" script-name="quicksand" src="http://use.edgefonts.net/quicksand.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-visible/1.2.0/jquery.visible.js" integrity="sha256-9+F6QJDINcErIuU5VVbMxo+cfbDBKoXwwgHslcsQznQ=" crossorigin="anonymous"></script>
    <script src="js/freelancer.min.js"></script>
    <script src="js/jquery.lineProgressbar.js"></script>

</body>

</html>
