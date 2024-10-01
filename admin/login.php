<?php
// 设置会话的过期时间为7天（604800秒）
session_set_cookie_params(999999999999999999);
// 启动会话
session_start();
// 引入config.inc.php文件
require_once 'datasets/config.inc.php';

// 检查是否提交了表单
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 在这里添加验证逻辑，例如检查用户名和密码是否正确
  

    if ($username == ADMIN && md5($password) == EDITCODE) {
        ?><script>alert("登录成功！");</script><?php
        $_SESSION['logged_in'] = 1;
        header('Location: index.php');

    } else {
        ?><script>alert("用户名或密码错误！");</script><?php
        $_SESSION['logged_in'] = 0;
        header('Location: login.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>登录页面</title>
    <style>
        body {
            background-image: url('/img/login.png');
            background-size: cover;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* 设置背景颜色为白色，透明度为80% */
            border: 2px solid black; /* 设置边框为2像素宽的黑色边框 */
            border-radius: 10px;
            text-align: center;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>登录</h2>
        <form action="" method="post">
            <label for="username">用户名:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">密码:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="登录">
        </form>
    </div>

</body>
</html>

