
<?php get_header() ?>

<div class="container mt-3 presentation">

<section style="background-color:#FFF;">

    <?php 
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post(); ?>

                <article <?php post_class(); ?>>
                    <div class="post-body">
                        <?php the_title('<h3>', '</h3>'); ?>
                        <?php the_content(); ?>
                    </div>
                </article>

            <?php endwhile;
        endif;
    ?>

</section>


</div>

<?php get_footer() ?>