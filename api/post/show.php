<?php

header("Access-Control-Allow-Origin:*");
header('Content-Type: application/json');

include_once '../config/db.php';
include_once '../models/Post.php';

$db = new db();
$connect = $db->connect();

$post = new Post($connect);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->show();

$post_item = array(
    'id' => $post->id,
    'title' => $post->title,
    'description' => $post->description
);

print_r(json_encode($post_item));

