#!/bin/bash

# Activate Theme
wp theme activate ai-generated-theme --allow-root

# Create Pages
wp post create --post_type=page --post_title="Home" --post_status=publish --allow-root
wp post create --post_type=page --post_title="Contact" --post_status=publish --allow-root
wp post create --post_type=page --post_title="About Us" --post_status=publish --allow-root

# Get Home Page ID and set as front page
HOME_ID=$(wp post list --post_type=page --post_title="Home" --field=ID --format=ids --allow-root)
if [ ! -z "$HOME_ID" ]; then
    wp option update show_on_front page --allow-root
    wp option update page_on_front $HOME_ID --allow-root
fi

# Create Menus
wp menu create "Main Menu" --allow-root
wp menu location assign "Main Menu" primary --allow-root

# Assign pages to menu
HOME_ID=$(wp post list --post_type=page --post_title="Home" --field=ID --format=ids --allow-root)
CONTACT_ID=$(wp post list --post_type=page --post_title="Contact" --field=ID --format=ids --allow-root)
ABOUT_ID=$(wp post list --post_type=page --post_title="About Us" --field=ID --format=ids --allow-root)

wp menu item add-post "Main Menu" $HOME_ID --allow-root
wp menu item add-post "Main Menu" $ABOUT_ID --allow-root
wp menu item add-post "Main Menu" $CONTACT_ID --allow-root

# WooCommerce Pages Setup
wp wc tool run install_pages --user=1 --allow-root || wp eval "WC_Install::create_pages();" --allow-root

# Update Site Title
wp option update blogname "Purple Crochet 🎀" --allow-root
wp option update blogdescription "Handmade Crochet with Love ✨" --allow-root

# Create WooCommerce Products (dummy products from Instagram posts)
# Using generic products for the sake of demo
wp wc product create --name="Crochet Tulip Flower 🌷" --type="simple" --regular_price="500" --description="Handmade crochet tulip flower." --status="publish" --user=1 --allow-root
wp wc product create --name="Crochet Butterfly ✨🦋" --type="simple" --regular_price="350" --description="Handmade crochet butterfly." --status="publish" --user=1 --allow-root
wp wc product create --name="Crochet 4 leaf clover🍀" --type="simple" --regular_price="250" --description="Handmade crochet clover keychain." --status="publish" --user=1 --allow-root
wp wc product create --name="Crochet Mini Kitty pouch 🧶✨" --type="simple" --regular_price="650" --description="Handmade crochet mini kitty pouch." --status="publish" --user=1 --allow-root
wp wc product create --name="Crochet Daisy Cardigan 🌼" --type="simple" --regular_price="2500" --description="Oversized crochet daisy cardigan." --status="publish" --user=1 --allow-root

echo "WordPress Automation Complete."
