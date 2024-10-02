
<?php

// 启动会话
session_start();

// 检查是否已登录
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1) {
    echo '你还没登录，即将进入登录页面....';
    // 如果未登录，重定向到login.php
    header('Location: /admin/login.php');
    exit;
}
// 继续执行下面的代码
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QQHOME后台管理系统 - 首页</title>
    <link href="http://lyear.itshubao.com/iframe/css/bootstrap.min.css" rel="stylesheet">
<link href="http://lyear.itshubao.com/iframe/css/materialdesignicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://lyear.itshubao.com/iframe/js/bootstrap-multitabs/multitabs.min.css">
<link href="http://lyear.itshubao.com/iframe/css/style.min.css" rel="stylesheet">
    <style>
    /* Sidebar Styles */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 150px; /* Adjust sidebar width as needed */
    height: 100%;
    background-color: #333;
    color: #fff;
    padding-top: 20px;
    overflow-y: auto; /* Add scrollbar if content overflows */
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    padding: 10px 0;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 10px;
}

.sidebar ul li a:hover {
    background-color: #555;
}

/* 左侧版权信息 */
.sidebar-footer {
    bottom: 0;
    width: 100%;
    height: 96px;
    border-top: 1px solid rgba(77,82,89,0.05);
    margin-top: 24px;
    padding-top: 24px;
    padding-right: 24px;
    padding-bottom: 24px;
    padding-left: 24px;
    font-size: 13px;
    line-height: 24px;
}
/* Main Content Styles */
.content {
    margin-left: 150px; /* Same width as sidebar */
    padding: 20px;
}
.firework {
    position: fixed;
    width: 10px;
    height: 10px;
    background-color: #ffcc00;
    border-radius: 50%;
    animation: explode 1s ease-out;
}

@keyframes explode {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(15);
        opacity: 0;
    }
}
/* styles.css */

</style>
    
</head>
<body>
    <!--头部信息-->
    <header class="lyear-layout-header">
      
      <nav class="navbar navbar-default">
        <div class="topbar">
          

          <li class="topbar-right">
            <li class="dropdown dropdown-profile">
              <a href="javascript:void(0)" data-toggle="dropdown">
                <img class="img-avatar img-avatar-48 m-r-10" src="/img/avatar.png" alt="Admin" />
                <span>Admin <span class="caret"></span></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">

                <li> <a class="multitabs" data-url="lyear_pages_edit_pwd.html" href="settings.php"><i class="mdi mdi-lock-outline"></i> 修改密码</a> </li>
                <li class="divider"></li>
                <li> <a href="logout.php"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
              </ul>
              </li>
              </ul>
          
        </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul>
          <h1>侧边栏</h1>
            <li><a href="#" onclick="loadPage('index1.php')">首页</a></li>
            <li><a href="#" onclick="loadPage('settings.php')">网站设置</a></li>
            <li><a href="#" onclick="loadPage('students.php')"></a></li>
        </ul>
        <div class="sidebar-footer">
          <p class="copyright">Copyright &copy; 2024. <a target="_blank" href="https://qingqiu.site">清秋</a> All rights reserved.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content" id="mainContent">
        <!-- Content will be loaded dynamically here -->
    </div>

    <!-- Script to load pages dynamically -->
    <script>
        function loadPage(page) {
            document.getElementById('mainContent').innerHTML = '';
            fetch(page)
            .then(response => response.text())
            .then(data => {
                document.getElementById('mainContent').innerHTML = data;
            });
        }
        // Load default page on page load
        window.onload = function() {
            loadPage('/index1.php');
        };
    </script>

    </div>

</body>
</html>
