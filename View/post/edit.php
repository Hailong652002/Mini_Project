<DOCTYPE html>
<head>
      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!----======== CSS ======== -->
        <link rel="stylesheet" href="./Public/css/style1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>   <!--<title>Dashboard Sidebar Menu</title>--> 
    </head>
    <html lang="en">
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="./Public/img/tải xuống.jpeg" alt="">
                    </span>
    
                    <div class="text logo-text">
                        <span class="name">User</span>
                        <span class="profession">Web developer</span>
                    </div>
                </div>
    
                <i class='bx bx-chevron-right toggle'></i>
            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="<?php echo "index.php?Controller=post&action=index"?>">
                                <i class='bx bx-home-alt icon' ></i>
                                <span class="text nav-text">Quản lý bài viết</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
    
                <div class="bottom-content">
                    <li class="">
                        <a href="?mod=user&act=logout">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Đăng xuất
                
                            </span>
                        </a>
                    </li>
                </div>
            </div>
    
        </nav>
        <section class="home">
        <div class="text">
        
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
                    <td><input type="file" name="image"
                    value="<?php echo isset($_POST['images']) ? $_POST['images'] : $posts['images']?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="Edit Post"></td>
                </tr>
            </table>
        </form>
        </div>
        </section>
        

        <script>
            const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            // modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
    
    toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");
    })
    
        </script>
    </body>
</html>
 
  