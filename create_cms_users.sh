#!/bin/bash

# ===== TẠO 3 CUSTOM ROLES =====

# Role 1: cms_read - chỉ đọc
wp --allow-root role create cms_read "CMS Read" --clone=subscriber
echo "Created role: cms_read"

# Role 2: cms_write - đọc + viết
wp --allow-root role create cms_write "CMS Write" --clone=contributor
wp --allow-root cap add cms_write publish_posts
wp --allow-root cap add cms_write upload_files
wp --allow-root cap add cms_write delete_posts
wp --allow-root cap add cms_write edit_published_posts
wp --allow-root cap add cms_write delete_published_posts
echo "Created role: cms_write"

# Role 3: cms_admin - cài plugin, cài theme
wp --allow-root role create cms_admin "CMS Admin" --clone=subscriber
wp --allow-root cap add cms_admin read
wp --allow-root cap add cms_admin install_plugins
wp --allow-root cap add cms_admin activate_plugins
wp --allow-root cap add cms_admin install_themes
wp --allow-root cap add cms_admin switch_themes
wp --allow-root cap add cms_admin update_plugins
wp --allow-root cap add cms_admin update_themes
echo "Created role: cms_admin"

# ===== TẠO 3 USERS =====
wp --allow-root user create cms_read cms_read@huynhanhtu.com \
  --role=cms_read \
  --user_pass=CmsRead@123 \
  --display_name="CMS Read User"
echo "Created user: cms_read"

wp --allow-root user create cms_write cms_write@huynhanhtu.com \
  --role=cms_write \
  --user_pass=CmsWrite@123 \
  --display_name="CMS Write User"
echo "Created user: cms_write"

wp --allow-root user create cms_admin cms_admin@huynhanhtu.com \
  --role=cms_admin \
  --user_pass=CmsAdmin@123 \
  --display_name="CMS Admin User"
echo "Created user: cms_admin"

# ===== KIỂM TRA =====
echo ""
echo "=== DANH SÁCH USERS ==="
wp --allow-root user list --fields=user_login,roles,user_email

echo ""
echo "=== QUYỀN CMS_READ ==="
wp --allow-root role list --fields=name,capabilities | grep -A5 cms_read

echo "ALL DONE!"
