<?php

/**
 * PHP Embedded server replacement for apache's common mod rewrite rule:
 *   RewriteCond %{REQUEST_FILENAME} !-f
 *   RewriteRule ^.+ /index.php [L]
 *
 * Usage: $ php -S 127.0.0.1:1234 -t . $(pwd)/cli-bootstrap.php
 * Insecure dev-only version.
 */

if (PHP_SAPI !== 'cli-server') return;

@list($reqF) = explode('?',$_SERVER['REQUEST_URI'],2);

$f=__DIR__.$reqF;
if (preg_match('/\.php$/',$reqF)) {
    $path = explode('/', $reqF);
    if (count($path)>2){
        array_pop($path);
        array_shift($path);
        chdir(__DIR__.'/'.implode('/',$path));
    }
    include $f;
    return;
}

if (is_file($f)) return false;

include 'index.php';
