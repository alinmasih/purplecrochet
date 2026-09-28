<?php get_header(); ?>
<div class="container">
    <?php if ( have_posts() ) : ?>
        <header class="page-header">
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header>
        <?php
        while ( have_posts() ) : the_post();
            the_title( '<h2>', '</h2>' );
            the_excerpt();
        endwhile;
    endif;
    ?>
</div>
<?php get_footer(); ?>
