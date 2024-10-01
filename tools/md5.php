<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD5 加密字符串</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('/img/login.php'); /* 设置背景图片 */
            background-size: cover; /* 背景图片适应整个页面 */
            background-position: center; /* 背景居中 */
            background-attachment: fixed; /* 背景固定 */
        }

        /* 透明遮罩，避免背景影响阅读 */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* 半透明白色遮罩 */
            z-index: -1;
        }

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9); /* 半透明背景容器 */
            padding: 40px; /* 增大内容区域的内边距 */
            border-radius: 15px; /* 圆角容器 */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* 添加阴影 */
        }

        input[type="text"] {
            padding: 15px; /* 增加输入框的内边距 */
            font-size: 20px; /* 增大字体 */
            width: 350px; /* 增大输入框的宽度 */
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 15px 30px; /* 调整按钮大小 */
            font-size: 20px; /* 增大字体 */
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* 弹出层的样式保持不变 */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            z-index: 1000;
        }

        /* 弹出层背景遮罩 */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .close-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* 响应式布局，适配小屏幕 */
        @media (max-width: 600px) {
            input[type="text"] {
                width: 100%; /* 输入框自适应宽度 */
            }

            button {
                width: 100%; /* 按钮自适应宽度 */
            }
        }
    </style>
</head>
<body>

<div class="overlay"></div> <!-- 透明遮罩 -->

<div class="container">
    <h1 style="font-size: 36px;">MD5 加密字符串</h1> <!-- 增大标题字体 -->
    <form method="POST">
        <input type="text" name="inputString" placeholder="输入字符串" required>
        <br>
        <button type="submit">加密并显示结果</button>
    </form>
</div>

<!-- 弹出层背景遮罩 -->
<div class="popup-overlay" id="popupOverlay"></div>

<!-- 弹出层 -->
<div class="popup" id="popup">
    <h2>加密结果</h2>
    <p id="md5Result"></p>
    <button class="close-btn" onclick="closePopup()">关闭</button>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputString = $_POST['inputString'];
    $md5Hash = md5($inputString);  // 使用PHP的md5函数加密
    echo "<script>
            document.getElementById('md5Result').textContent = '$md5Hash';
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popupOverlay').style.display = 'block';
          </script>";
}
?>

<script>
    // 关闭弹出层的函数
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popupOverlay').style.display = 'none';
    }
</script>

</body>
</html>
