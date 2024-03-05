<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sua bai viet</title>
</head>
<body>
    <div class="content">
        <h3>sua bai viet</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Title:"
                    value="<?php echo isset($_POST['title']) ? $_POST['title'] : $posts['title']?>"></td>
                </tr>
                <tr>
                    <td>content</td>
                    <td><input type="text" name="content" placeholder="Content: "
                    value="<?php echo isset($_POST['content']) ? $_POST['content'] : $posts['content']?>"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="link" name="image"
                    value="<?php echo isset($_POST['images']) ? $_POST['images'] : $posts['images']?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Edit Post"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>