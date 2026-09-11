#!/bin/bash

IFRAME='<iframe width="100%" height="400" src="https://www.youtube.com/embed/ajEDPzS-BAg?si=V1gOH8tIfFbk7KcJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius:8px;display:block;"></iframe>'

for POST_ID in 30 32 33; do
  # Lấy content hiện tại, xóa hết iframe/figure cũ, thêm iframe mới vào cuối
  OLD=$(wp --allow-root post get $POST_ID --field=post_content)
  # Xóa block figure cũ
  CLEAN=$(echo "$OLD" | sed 's|<figure[^>]*>.*</figure>||g')
  # Thêm iframe mới vào cuối
  NEW="$CLEAN $IFRAME"
  wp --allow-root post update $POST_ID --post_content="$NEW"
  echo "Updated post $POST_ID"
done

echo "ALL DONE!"
