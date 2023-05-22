<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa bài viết</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Chỉnh sửa bài viết</h1>

    <form method="POST" action="index.php?action=update&id=<?php echo $post['id']; ?>">
        <div>
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required>
        </div>
        <div>
            <label for="body">Nội dung:</label>
            <textarea id="description" name="description" required><?php echo $post['description']; ?></textarea>
        </div>
        <button type="submit">Lưu</button>
    </form>

    <a href="index.php">Quay lại danh sách</a>

    <script src="main.js"></script>
</body>
</html>
