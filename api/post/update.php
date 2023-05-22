<?php

header("Access-Control-Allow-Origin:*");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");


include_once '../config/db.php';
include_once '../models/Post.php';

$db = new db();
$connect = $db->connect();

$post = new Post($connect);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->title = $data->title;
$post->description = $data->description;

if($post->update()) {
    echo json_encode(array('message', 'Post Updated'));
} else {
    echo json_encode(array('message', 'Post Not Updated'));
}