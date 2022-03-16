<?php

use ThiagoCI\Post;

require __DIR__ . '/vendor/autoload.php';

$post = new Post('a1b2c3d4e8');
$post->send();