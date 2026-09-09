#!/bin/bash
URL1=$(wp --allow-root post get 16 --field=guid)
URL2=$(wp --allow-root post get 17 --field=guid)

echo "Image 1: $URL1"
echo "Image 2: $URL2"

IMG1_TAG="<figure><img src='$URL1' alt='Hinh anh minh hoa' style='width:100%;border-radius:8px;margin:16px 0;' /></figure>"
IMG2_TAG="<figure><img src='$URL2' alt='Hinh anh minh hoa' style='width:100%;border-radius:8px;margin:16px 0;' /></figure>"

for POST_ID in 5 7 9 11 13; do
  OLD=$(wp --allow-root post get $POST_ID --field=post_content)
  NEW="$OLD $IMG2_TAG"
  wp --allow-root post update $POST_ID --post_content="$NEW"
  echo "Updated post $POST_ID with img2"
done

for POST_ID in 6 8 10 12 14; do
  OLD=$(wp --allow-root post get $POST_ID --field=post_content)
  NEW="$OLD $IMG1_TAG"
  wp --allow-root post update $POST_ID --post_content="$NEW"
  echo "Updated post $POST_ID with img1"
done

echo "All content images added!"
