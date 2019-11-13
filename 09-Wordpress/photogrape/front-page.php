
<?php get_header() ?>

    <div class="container mt-3 presentation">

        <?php get_template_part( 'content', 'photogrape' ) ?>

        <div class="row">
            <div class="col">
                <?php dynamic_sidebar('partner'); ?>
            </div>
        </div>

    </div>

<?php get_footer() ?>