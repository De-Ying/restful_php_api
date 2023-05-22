<?php

header("Access-Control-Allow-Origin:*");
header('Content-Type: application/json');

include_once '../config/db.php';
include_once '../models/Post.php';

$db = new db();
$connect = $db->connect();

$post = new Post($connect);

$read = $post->read();

$num = $read->rowCount();

if ($num > 0) {
    $post_array = [];

    while($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'description' => $description
        );

        array_push($post_array, $post_item);
    }

    echo json_encode($post_array);
} else {
    $post_array = [];
    echo json_encode($post_array);
}