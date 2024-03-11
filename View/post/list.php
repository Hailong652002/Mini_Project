<!DOCTYPE html>
<html lang="en">
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
            <?php 
                 if (!empty($posts)):
                    foreach ($posts AS $p):
            ?>
        <div class="text">
                <form >
                    <table>
                    <?php
                    //khai báo 3 url xem, sửa, xóa
                    $urlDetail =
                        "index.php?Controller=post&action=detail&id=" . $p['idposts'];
                    $urlEdit =
                        "index.php?Controller=post&action=edit&id=" . $p['idposts'];
                    $urlDelete =
                        "index.php?Controller=post&action=delete&id=" . $p['idposts'];
                    ?>
                        <a style="color:blue !important;" href="<?php echo $urlEdit ?>"><i class="bi bi-pencil-fill"></i></i></a>
                        <a href="<?php echo $urlDelete ?>"><i class="bi bi-x-circle-fill"></i></a>
                        <tr>
                            <td class="title"><?php echo $p['title'] ?></td>
                        </tr>
                        <tr>
                            <td class="content"><?php echo $p['content'] ?></td>
                        </tr>
                        <tr>
                            <td><img src="https://baogiaothong.mediacdn.vn/upload/2-2022/images/2022-04-18/1-1650247268-869-width740height555.jpg" alt=""> &nbsp;</td>
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
            img{
               width: 200px;
            }
            table{
                position: relative;
            }
            table a{
                position:absolute;
                top:0;
            }
            a i{
                color:red;
                right: 0 !important;
            }

        /* CSS for the table */
        .title{
            padding: 0 10px;
        }
        .content{
            font-size: 11px;
        }
        .text{
            display: inline-block;
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