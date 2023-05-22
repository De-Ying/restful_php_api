<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết bài viết</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
    <h1>Chi tiết bài viết</h1>

    <div>
        <p><strong>ID:</strong> <?= $post['id'] ?></p>
        <p><strong>Tiêu đề:</strong> <?= $post['title'] ?></p>
        <p><strong>Nội dung:</strong> <?= $post['description'] ?></p>
    </div>

    <a href="index.php">Quay lại danh sách bài viết</a>
</body>
</html>
