<DOCTYPE html>
    <!-- Coding by CodingLab | www.codinglabweb.com -->
    <html lang="en">
    <head>
      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!----======== CSS ======== -->
        <link rel="stylesheet" href="../Public/css/style1.css">
        
        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>   <!--<title>Dashboard Sidebar Menu</title>--> 
    </head>
    <div> <!--css-->
    </div>
    
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="../Public/img/tải xuống.jpeg" alt="">
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
                            <a href="#">
                                <i class='bx bx-home-alt icon' ></i>
                                <span class="text nav-text">Quản lý bài viết</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
    
                <div class="bottom-content">
                    <li class="">
                        <a href="#">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
    
        </nav>
        <section class="home">
            <?php 
                 if (!empty($p)):
                    foreach ($p AS $posts):
            ?>
        <div class="text">
                <form >
                    <table>
                        <tr>
                            <td class="title"><?php echo $posts['title'] ?></td>
                        </tr>
                        <tr>
                            <td class="content"><?php echo $posts['content'] ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                </form>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="2">KHông có dữ liệu</td>
        </tr>
        <?php endif; ?>
        </section>
        <style>
        /* CSS for the table */
        .title{
            padding: 0 10px;
        }
        .content{
            font-size: 11px;
        }
        table {
            border-collapse: collapse;
            border: 1px solid black;
            background-color: white;
            min-width: 200px;
            min-height: 100px;
        }
        td {
            border: 1px solid black;
            padding: 10px;
        }
        table:hover{
            box-shadow: 2px 2px 5px black;
        }
    </style>

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