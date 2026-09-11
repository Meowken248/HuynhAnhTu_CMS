#!/bin/bash
sed -i "/That's all, stop editing/i define('FS_METHOD', 'direct');" /var/www/html/wp-config.php
grep 'FS_METHOD' /var/www/html/wp-config.php && echo "Done!" || echo "Failed"
