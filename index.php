<?php

require_once('./app/controllers/PostController.php');
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$postController = new PostController();

if ($action === 'index') {
    $postController->index();
} elseif ($action === 'show') {
    $postController->show($id);
} elseif ($action === 'create') {
    $postController->create();
} elseif ($action === 'store') {
    $postData = $_POST;
    $postController->store($postData);
} elseif ($action === 'edit') {
    $postController->edit($id);
} elseif ($action === 'update') {
    $postData = $_POST;
    $postController->update($id, $postData);
} elseif ($action === 'delete') {
    $postController->destroy($id);
}

