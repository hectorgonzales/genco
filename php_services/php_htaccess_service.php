RewriteEngine On

Rewritecond %{REQUEST_FILENAME} !-d
Rewritecond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php

Rewritecond %{REQUEST_FILENAME} !-d
Rewritecond %{REQUEST_FILENAME}.html -f
RewriteRule ^(.*)$ $1.html

Rewritecond %{REQUEST_FILENAME} !-f
Rewritecond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+?)/?$ index.php?op=$1 [L,QSA]