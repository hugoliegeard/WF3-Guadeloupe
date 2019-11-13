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

<body <?php body_class(); ?>>

    <!-- Image de Header -->
    <?php if ( has_header_image() ) { ?>

        <img src="<?php header_image(); ?>" 
            class="photogrape__header" 
            alt="<?php bloginfo('name'); ?>">

    <?php } else { ?>

        <img src="<?= get_template_directory_uri() ?>/image/photographe.jpg" class="photogrape__header" alt="<?php bloginfo('name'); ?>">

    <?php } ?>

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