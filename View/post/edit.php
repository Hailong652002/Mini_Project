<div style="color: red">
    <?php echo $error; ?>
</div>
<form action="" method="post">
    Title:
    <input type="text"
           name="title"
           value="<?php
           echo isset($_POST['title']) ? $_POST['title'] : $posts['title']?>"
    />
    <br />
    Content:
    <input type="text"
           name="content"
           value="<?php
           echo isset($_POST['content']) ? $_POST['content'] : $posts['content']?>"
    />
    <br />
    <input type="submit" name="submit" value="Update" />
</form>