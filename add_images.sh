#!/bin/bash
URL1=$(wp --allow-root post get 16 --field=guid)
URL2=$(wp --allow-root post get 17 --field=guid)

echo "Image 1: $URL1"
echo "Image 2: $URL2"

IMG1_TAG="<figure><img src='$URL1' alt='Hinh anh minh hoa' style='width:100%;border-radius:8px;margin:16px 0;' /></figure>"
IMG2_TAG="<figure><img src='$URL2' alt='Hinh anh minh hoa' style='width:100%;border-radius:8px;margin:16px 0;' /></figure>"

# Thêm ảnh vào 3 bài viết thể thao mới (Tennis, Pic, Football)
for POST_ID in 30 33; do
  OLD=$(wp --allow-root post get $POST_ID --field=post_content)
  NEW="$OLD $IMG2_TAG"
  wp --allow-root post update $POST_ID --post_content="$NEW"
  echo "Updated sports post $POST_ID with img2"
done

OLD=$(wp --allow-root post get 32 --field=post_content)
NEW="$OLD $IMG1_TAG"
wp --allow-root post update 32 --post_content="$NEW"
echo "Updated sports post 32 with img1"

echo "Sports posts images done!"
