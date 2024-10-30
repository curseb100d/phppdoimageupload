<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <h1>Registration form</h1>
    <div class="container">
        <form action="display.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile">
                <label for="image">Image</label>
                <input type="file" name="file">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>