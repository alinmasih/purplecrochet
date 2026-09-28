#!/bin/bash

# Activate Theme
wp theme activate ai-generated-theme --allow-root

# Get Home Page ID and set as front page
HOME_ID=$(wp post list --post_type=page --post_title="Home" --field=ID --format=ids --allow-root | awk '{print $1}')
if [ ! -z "$HOME_ID" ]; then
    wp option update show_on_front page --allow-root
    wp option update page_on_front $HOME_ID --allow-root
fi

# Update Site Title
wp option update blogname "Purple Crochet 🎀" --allow-root
wp option update blogdescription "Handmade Crochet with Love ✨" --allow-root

echo "WordPress Fix Complete."
