#!/bin/bash

# Thay YouTube link bằng iframe embed trong 3 bài thể thao

# Bài 33: World Cup 2026 - Football
OLD=$(wp --allow-root post get 33 --field=post_content)
NEW=$(echo "$OLD" | sed 's|https://www.youtube.com/watch?v=NzBDDDqNKto|<figure class="wp-block-embed"><div class="wp-block-embed__wrapper"><iframe width="100%" height="400" src="https://www.youtube.com/embed/NzBDDDqNKto" title="World Cup 2026" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius:8px;"></iframe></div></figure>|g')
wp --allow-root post update 33 --post_content="$NEW"
echo "Updated post 33 (Football) - YouTube embedded"

# Bài 32: Pickleball - Pic
OLD=$(wp --allow-root post get 32 --field=post_content)
NEW=$(echo "$OLD" | sed 's|https://www.youtube.com/watch?v=fMBz8fRxBNY|<figure class="wp-block-embed"><div class="wp-block-embed__wrapper"><iframe width="100%" height="400" src="https://www.youtube.com/embed/fMBz8fRxBNY" title="Pickleball" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius:8px;"></iframe></div></figure>|g')
wp --allow-root post update 32 --post_content="$NEW"
echo "Updated post 32 (Pickleball) - YouTube embedded"

# Bài 30: Federer - Tennis
OLD=$(wp --allow-root post get 30 --field=post_content)
NEW=$(echo "$OLD" | sed 's|https://www.youtube.com/watch?v=gxKwCqSRgVY|<figure class="wp-block-embed"><div class="wp-block-embed__wrapper"><iframe width="100%" height="400" src="https://www.youtube.com/embed/gxKwCqSRgVY" title="Federer Tennis" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius:8px;"></iframe></div></figure>|g')
wp --allow-root post update 30 --post_content="$NEW"
echo "Updated post 30 (Tennis) - YouTube embedded"

echo "ALL DONE! YouTube videos now embedded as iframes."
