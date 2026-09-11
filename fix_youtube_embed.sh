#!/bin/bash

NEW_IFRAME='<figure class="wp-block-embed"><div class="wp-block-embed__wrapper"><iframe width="100%" height="400" src="https://www.youtube.com/embed/ajEDPzS-BAg" title="Sports Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius:8px;"></iframe></div></figure>'

for POST_ID in 30 32 33; do
  OLD=$(wp --allow-root post get $POST_ID --field=post_content)
  # Xóa toàn bộ iframe cũ và thay bằng iframe mới
  NEW=$(echo "$OLD" | sed 's|<figure class="wp-block-embed">.*</figure>||g')
  FINAL="$NEW $NEW_IFRAME"
  wp --allow-root post update $POST_ID --post_content="$FINAL"
  echo "Updated post $POST_ID with new YouTube video"
done

echo "ALL DONE!"
