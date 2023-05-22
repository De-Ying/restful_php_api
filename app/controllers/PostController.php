<?php

require_once './app/models/Post.php';

class PostController
{
    public function index()
    {
        $posts = Post::all();
        require_once('./app/views/index.php');
    }

    public function show($id)
    {
        $post = Post::find($id);
        require_once('./app/views/show.php');
    }

    public function create()
    {
        require_once('./app/views/create.php');
    }

    public function store($data)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $data = [
            'title' => $title,
            'description' => $description,
        ];

        $createdPost = Post::create($data);
        // Xử lý kết quả và chuyển hướng người dùng đến trang hiển thị thông tin bài viết mới
        header('Location: index.php');
        
    }

    public function edit($id)
    {
        $post = Post::find($id);
        require_once('./app/views/edit.php');
    }

    public function update($id, $data)
    {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $data = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
        ];

        $updatedPost = Post::update($data);
        // Xử lý kết quả và chuyển hướng người dùng đến trang hiển thị thông tin bài viết đã cập nhật
        header('Location: index.php');
    }

    public function destroy($id)
    {
        $data = [
            'id' => $id
        ];
        $result = Post::delete($data);
        // Xử lý kết quả và chuyển hướng người dùng đến trang danh sách bài viết
        header('Location: index.php');
    }
}
