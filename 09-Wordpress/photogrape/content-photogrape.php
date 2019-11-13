<?php
    # https://developer.wordpress.org/reference/classes/wp_query/
    $args = array(
        'post_type' => 'photogrape_type',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );

    # On demande a WP de faire la requète
    $posts = new WP_Query( $args );

    # On vérifie si la requète a retourné des résultats.
    if ( $posts->have_posts() ) {

        # On a des resultats, on peux les parcourir.
        while( $posts->have_posts() ) {

            $posts->the_post();

            echo '<div class="card mb-3">';
            echo '<div class="row no-gutters">';
            echo '<div class="col-md-4">'; 
            echo    get_the_post_thumbnail( $id, 'photogrape-size' );
            echo '</div>';
            echo '<div class="col-md-8">';
            echo '<div class="card-body">';
            echo '<h2 id="titlechild" class="card-title">' . get_the_title() . '</h2>'; 
            echo '<p id="text" class="card-text mt-5">'; 
            echo    the_content();
            echo '</p>'; 
            echo '</div>';
            echo '</div>'; 
            echo '</div></div>'; 

        } # Fin du While

    } # Fin du if have_posts

?>
