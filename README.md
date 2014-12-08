php-cli-bootstrap
=================

Bootstrap script for PHP -S to mimic common mod_rewrite setup for dev purposes.

Used to quickly run a site with .htaccess rewrite config looking like 

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^.+ /index.php [L]

It mimics `RewriteCond %{REQUEST_FILENAME} !-f` behaviour and support direct requests for other php files using `include`.

Note: if not using `start.sh` script, keep an eye on using a full path for `cli-bootstrap.php`, otherwise server may fail after first request to deep-nested .php file.
