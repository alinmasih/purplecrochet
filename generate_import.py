import json
import os

with open('data/raw/instagram.json', 'r') as f:
    data = json.load(f)

profile = data[0]

commands = []

if os.path.exists("data/media/photos/profile.jpg"):
    commands.append('wp media import /data/media/photos/profile.jpg --title="Profile Picture" --alt="Purple Crochet Profile Picture" --allow-root')

for post in profile.get("latestPosts", []):
    post_id = post.get("id")
    caption = post.get("caption", "").replace('"', '\\"').replace('\n', ' ')
    
    # Check if main image exists
    img_path = f"data/media/photos/post_{post_id}.jpg"
    if os.path.exists(img_path):
        commands.append(f'wp media import /data/media/photos/post_{post_id}.jpg --title="Post {post_id}" --caption="{caption}" --alt="Instagram Post" --allow-root')
        
    # Check if video exists
    vid_path = f"data/media/videos/video_{post_id}.mp4"
    if os.path.exists(vid_path):
        commands.append(f'wp media import /data/media/videos/video_{post_id}.mp4 --title="Video {post_id}" --caption="{caption}" --allow-root')
        
    # Sidecars
    for i in range(10):
        sidecar_path = f"data/media/photos/post_{post_id}_{i}.jpg"
        if os.path.exists(sidecar_path):
            commands.append(f'wp media import /data/media/photos/post_{post_id}_{i}.jpg --title="Post {post_id} - {i}" --caption="{caption}" --alt="Instagram Post" --allow-root')

with open('import_media.sh', 'w') as f:
    f.write("#!/bin/bash\n")
    for cmd in commands:
        f.write(cmd + "\n")
