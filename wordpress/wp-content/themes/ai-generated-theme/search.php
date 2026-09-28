<?php get_header(); ?>
<div class="container">
    <h1>Search Results for: <?php echo get_search_query(); ?></h1>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_title( '<h2>', '</h2>' );
            the_excerpt();
        endwhile;
    else :
        echo '<p>No results found.</p>';
    endif;
    ?>
</div>
<?php get_footer(); ?>
