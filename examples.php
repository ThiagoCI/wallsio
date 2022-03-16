<?php

use ThiagoCI\WallsIO\Post;

require __DIR__ . '/vendor/autoload.php';

// [Walls.io] Settings -> API -> ACTIVATE API ACCESS -> "Your access token"
$post = new Post('YOUR_ACCESS_TOKEN');

#EXAMPLES

// print_r($post->new([
//     'text' => 'Hello',
//     'image' => 'https://dummyimage.com/600x400/000/fff.jpg&text=Test',
//     'user_name' => 'Test',
//     'status'=>0
// ]));

// print_r($post->list([
//     'fields' => 'id,comment,type,post_link,post_image,post_video',
//     'highlighted_only' => 0,
// ]));

// print_r($post->rss());