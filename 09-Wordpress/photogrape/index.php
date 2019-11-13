<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Permet a WP de gérer les titres de notre site. -->
    <title>
        <?php wp_title(); ?>
    </title>
    <!-- 
        Permet a WP de charger dans notre entête
        les scripts qu'il a besoin.
    -->
    <?php wp_head(); ?>
</head>

<body class="photogrape">

    <!-- Image de Header -->
    <img src="<?= get_template_directory_uri() ?>/image/photographe.jpg" 
        class="photogrape__header" alt="<?php bloginfo('name'); ?>">

    <div class="container photogrape__container">

        <!-- CITATION -->
        <div class="float-left">
            <p id="citation photogrape__citation">
                <?php bloginfo('name'); ?> | 
                <?php bloginfo('description'); ?>
            </p>
        </div>

        <!--BOUTON CONNEXION & INSCRIPTION-->

        <nav id="nav1" class="photogrape__navbar navbar navbar-expand-md navbar-light float-right">
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="order-1">
                    <a href="<?= wp_login_url(); ?>" class="btn btn-sm btn-outline-light">Connexion</a>
                </li>
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="order-2">
                    <a href="<?= wp_registration_url(); ?>" class="btn btn-sm btn-outline-light">Inscription</a>
                </li>
            </ul>
            <!--/CONNEXION & INSCRIPTION-->
        </nav>

        <!--2nd BAR DE NAVIGATION-->

        <div class="mt-2 header-top" style="clear: both;">
            <nav id="nav2" class="navbar navbar-expand-lg navbar-light bg-light">
                
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<img id="logo" src="'. get_template_directory_uri() .'/image/logophoto.png" alt="logo">';
                        }
                    }
                ?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- On positionne notre menu WP a cet endroit de notre thème -->
                    <?php wp_nav_menu( array( 'theme_location' => 'photogrape-menu' ) ); ?>
                </div>
            </nav>
        </div>
    </div>


    <div class="container mt-3 presentation">

        <div class="card mb-3">

            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= get_template_directory_uri() ?>/image/enfant.jpg" class="card-img" alt="enfant">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h2 id="titlechild" class="card-title">The Joy of a Child</h2>
                        <p id="text" class="card-text mt-5"> Chaque jour une nouvelle découverte, un petit progrès, un émerveillement. Vous voulez vous souvenir de ces petites joies du quotidien, les bouilles adorables, l'énergie inépuisable de l'enfance. Vous avez frappé à la bonne porte, j'ai hâte de raconter votre histoire !</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="partner">
            <div id="partner" class="col-12 partenaires">
                <ul class="list-group list-group-horizontal-md">
                    <li class="list-group-item"><img src="<?= get_template_directory_uri() ?>/image/partenaire1.jpg" alt="partenaire1" style="max-width: 150px"></li>
                    <li class="list-group-item"><img src="<?= get_template_directory_uri() ?>/image/partenaire2.jpg" alt="partenaire2" style="max-width: 150px"></li>
                    <li class="list-group-item"><img src="<?= get_template_directory_uri() ?>/image/partenaire3.jpg" alt="partenaire3" style="max-width: 150px"></li>
                    <li class="list-group-item"><img src="<?= get_template_directory_uri() ?>/image/partenaire4.jpg" alt="partenaire4" style="max-width: 150px"></li>
                </ul>
            </div>
        </div>

    </div>


    <!-- Footer -->
    <footer class="page-footer font-small mdb-color pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Google Map</h6>
      <div>
        <!--Google map-->
        <div id="map-container-google-6" class="z-depth-1-half map-container-5">
          <iframe src="https://maps.google.com/maps?q=New-York&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" width="100%" height="260" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <!--/.Card content-->

    <!--/.Card-->
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 mb-4 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Newsletter</h6>
                    <!-- Form -->
                    <form class="input-group">
                        <input type="email" class="form-control form-control-sm" placeholder="Votre email" aria-label="Votre email" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark btn-sm my-0">Envoyer</button>
                        </div>
                    </form>
                    <!-- Form -->
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p>
                        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> photogrape@gmail.com</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p>
                        <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Footer links -->

            <hr>

            <!-- Grid row -->
            <div class="row d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-12">

                    <!--Copyright-->
                    <p class="text-center">© 2019 Copyright:
                        <a href="index.html">
                            <strong> Photogrape.com</strong>
                        </a>
                    </p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- Footer -->

    <!-- 
        Permet a WP de charger dans notre pied de page
        les scripts qu'il a besoin.
    -->
    <?php wp_footer(); ?>
</body>

</html>
