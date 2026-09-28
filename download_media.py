import json
import urllib.request
import os

with open('data/raw/instagram.json', 'r') as f:
    data = json.load(f)

if not data:
    print("No data found")
    exit(1)

profile = data[0]

print("Downloading profile pic...")
profile_pic_url = profile.get("profilePicUrlHD") or profile.get("profilePicUrl")
if profile_pic_url:
    try:
        urllib.request.urlretrieve(profile_pic_url, "data/media/photos/profile.jpg")
    except Exception as e:
        print(f"Failed to download profile pic: {e}")

posts = profile.get("latestPosts", [])
print(f"Found {len(posts)} posts. Downloading media...")

for post in posts:
    post_id = post.get("id")
    
    # Download main display image (for image posts, or cover for video/sidecar)
    display_url = post.get("displayUrl")
    if display_url:
        try:
            urllib.request.urlretrieve(display_url, f"data/media/photos/post_{post_id}.jpg")
        except Exception as e:
            print(f"Failed to download image for post {post_id}: {e}")
            
    # Download video if available
    video_url = post.get("videoUrl")
    if video_url:
        try:
            urllib.request.urlretrieve(video_url, f"data/media/videos/video_{post_id}.mp4")
        except Exception as e:
            print(f"Failed to download video for post {post_id}: {e}")
            
    # Handle sidecar images
    images = post.get("images", [])
    for i, img_url in enumerate(images):
        try:
            urllib.request.urlretrieve(img_url, f"data/media/photos/post_{post_id}_{i}.jpg")
        except Exception as e:
            print(f"Failed to download sidecar image {i} for post {post_id}: {e}")

print("Download complete.")
