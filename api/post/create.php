<?php

header("Access-Control-Allow-Origin:*");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");


include_once '../config/db.php';
include_once '../models/Post.php';

$db = new db();
$connect = $db->connect();

$post = new Post($connect);

$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->description = $data->description;

if($post->create()) {
    echo json_encode(array('message', 'Post Created'));
} else {
    echo json_encode(array('message', 'Post Not Created'));
}