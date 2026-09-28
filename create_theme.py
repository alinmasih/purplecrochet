import os

theme_dir = 'wordpress/wp-content/themes/ai-generated-theme'
os.makedirs(theme_dir, exist_ok=True)

files = {
    'style.css': '''/*
Theme Name: Purple Crochet
Theme URI: http://localhost:8080
Author: AI Website Builder
Author URI: http://localhost:8080
Description: Custom WooCommerce theme for Purple Crochet.
Version: 1.0.0
Requires at least: 5.0
Tested up to: 6.4
Requires PHP: 7.0
Text Domain: purple-crochet
*/

:root {
    --primary: #B39DDB;
    --primary-light: #D1C4E9;
    --accent: #F48FB1;
    --text-dark: #333333;
    --text-light: #777777;
    --bg-light: #FAFAFA;
    --white: #FFFFFF;
    --radius: 12px;
    --font-heading: 'Outfit', sans-serif;
    --font-body: 'Inter', sans-serif;
}

body {
    font-family: var(--font-body);
    color: var(--text-dark);
    background-color: var(--bg-light);
    margin: 0;
    padding: 0;
}

h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-heading);
    color: var(--primary);
}

a {
    color: var(--primary);
    text-decoration: none;
}

.button, button, input[type="submit"] {
    background-color: var(--primary);
    color: var(--white);
    padding: 12px 24px;
    border-radius: 30px;
    border: none;
    cursor: pointer;
    font-family: var(--font-heading);
    transition: background 0.3s ease;
}

.button:hover, button:hover, input[type="submit"]:hover {
    background-color: var(--accent);
}

header {
    background: var(--white);
    padding: 20px 40px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 100;
}

.logo {
    font-size: 24px;
    font-weight: 700;
    color: var(--primary);
    font-family: var(--font-heading);
}

.nav-menu {
    display: flex;
    gap: 20px;
}

footer {
    background: var(--primary-light);
    padding: 40px;
    text-align: center;
    margin-top: 60px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.hero {
    background: linear-gradient(135deg, #f3e5f5, #fce4ec);
    padding: 80px 20px;
    text-align: center;
    border-radius: var(--radius);
    margin-top: 20px;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.product-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 15px;
    aspect-ratio: 1;
    object-fit: cover;
}
''',
    'functions.php': '''<?php
function purple_crochet_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'purple-crochet' ),
    ) );
}
add_action( 'after_setup_theme', 'purple_crochet_setup' );

function purple_crochet_scripts() {
    wp_enqueue_style( 'purple-crochet-style', get_stylesheet_uri() );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@400;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'purple_crochet_scripts' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main" class="container">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}
''',
    'header.php': '''<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Purple Crochet 🎀</a>
        </div>
        <nav class="nav-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => false
            ) );
            ?>
            <a href="/shop">Shop</a>
        </nav>
    </header>
''',
    'footer.php': '''    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Purple Crochet. Handmade with ❤️ in Hyderabad.</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
''',
    'front-page.php': '''<?php get_header(); ?>
<main class="container">
    <div class="hero">
        <h1>Handmade Crochet with Love ✨</h1>
        <p>Discover our beautiful collection of crochet cardigans, plushies, keychains, and accessories.</p>
        <a href="/shop" class="button">Shop the Collection</a>
    </div>

    <h2 style="text-align: center; margin-top: 60px;">Latest Arrivals</h2>
    <div class="products-grid">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
        ?>
    </div>
</main>
<?php get_footer(); ?>
''',
    'page.php': '''<?php get_header(); ?>
<div class="container">
    <?php
    while ( have_posts() ) : the_post();
        the_title( '<h1>', '</h1>' );
        the_content();
    endwhile;
    ?>
</div>
<?php get_footer(); ?>
''',
    'single.php': '''<?php get_header(); ?>
<div class="container">
    <?php
    while ( have_posts() ) : the_post();
        the_title( '<h1>', '</h1>' );
        the_content();
    endwhile;
    ?>
</div>
<?php get_footer(); ?>
''',
    'archive.php': '''<?php get_header(); ?>
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
''',
    'search.php': '''<?php get_header(); ?>
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
''',
    '404.php': '''<?php get_header(); ?>
<div class="container" style="text-align: center; padding: 100px 0;">
    <h1>404 - Oops! We couldn't find that page.</h1>
    <p>The page you are looking for does not exist.</p>
    <a href="/" class="button">Go Home</a>
</div>
<?php get_footer(); ?>
'''
}

for filename, content in files.items():
    with open(os.path.join(theme_dir, filename), 'w') as f:
        f.write(content)

print("Theme files created successfully.")
