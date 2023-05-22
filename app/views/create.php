<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <h1>Add Post</h1>
    <form method="POST" action="index.php?action=store">
        <label>Title:</label><br>
        <input type="text" name="title"><br><br>
        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
