<DOCTYPE html>
    <!-- Coding by CodingLab | www.codinglabweb.com -->
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
                            <a href="<?php echo "index.php?Controller=post&action=list"?>">
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
                    <td><input type="text" name="title" placeholder="Title:"></td>
                </tr>
                <tr>
                    <td>content</td>
                    <td><input type="text" name="content" placeholder="Content:"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add_post" value="Add Post"></td>
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
 