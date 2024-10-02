
<!--
////////////////////////////////////////////////////////////////////
//                          _ooOoo_                               //
//                         o8888888o                              //
//                         88" . "88                              //
//                         (| ^_^ |)                              //
//                         O\  =  /O                              //
//                      ____/`---'\____                           //
//                    .'  \\|     |//  `.                         //
//                   /  \\|||  :  |||//  \                        //
//                  /  _||||| -:- |||||-  \                       //
//                  |   | \\\  -  /// |   |                       //
//                  | \_|  ''\---/''  |   |                       //
//                  \  .-\__  `-`  ___/-. /                       //
//                ___`. .'  /--.--\  `. . ___                     //
//              ."" '<  `.___\_<|>_/___.'  >'"".                  //
//            | | :  `- \`.;`\ _ /`;.`/ - ` : | |                 //
//            \  \ `-.   \_ __\ /__ _/   .-` /  /                 //
//      ========`-.____`-.___\_____/___.-`____.-'========         //
//                           `=---='                              //
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^        //
//             佛祖保佑       永无故障     永不修改               //
////////////////////////////////////////////////////////////////////
-->
<?php
// 定义文件路径
$filePath ='../datasets/config.inc.php';

// 判断是否为POST请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取提交的内容
    $content = $_POST['content'];

    // 检查文件是否存在
    if (file_exists($filePath)) {
        // 保存内容到文件
        if (file_put_contents($filePath, $content)) {
            ?><script>alert('保存成功');</script><?php
        } else {
            ?><script>alert('保存失败');</script><?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QQHOME后台管理系统 - 网站设置</title>
    <style>
        /* 设置页面全局样式 */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/login.png'); /* 这里放置背景图片的路径 */
            background-size: cover;
            background-position: center;
        }

        /* 添加一个半透明的遮罩层来提高可读性 */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* 半透明白色背景，增强对比度 */
            z-index: -1;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            color: #444;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;          /* 调整宽度 */
            max-width: 1000px;     /* 设置最大宽度 */
            box-sizing: border-box; /* 包含padding在宽度内 */
        }

        textarea {
            width: 100%;
            height: 400px;         /* 调整高度 */
            font-family: Consolas, 'Courier New', monospace;
            font-size: 16px;       /* 增加字体大小 */
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        button,a {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;    /* 调整按钮的大小 */
            border: none;
            border-radius: 5px;
            font-size: 18px;       /* 增大字体 */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button,a:hover {
            background-color: #45a049;
        }

        .message {
            color: #d9534f;
            text-align: center;
        }

        @media (max-width: 600px) {
            textarea {
                height: 250px;     /* 在小屏幕上调整文本区域的高度 */
            }

            button,a {
                width: 100%;       /* 在小屏幕上按钮全宽度 */
            }
        }
    </style>
</head>
<body>

    <!-- 背景图上的透明遮罩层 -->
    <div class="overlay"></div>

    <div class="container">
        <h1>网站设置</h1>

        <?php
        // 定义文件路径
        $filePath = '../datasets/config.inc.php';

        // 判断文件是否存在
        if (file_exists($filePath)) {
            // 读取文件内容
            $fileContent = htmlspecialchars(file_get_contents($filePath));
        } else {
            echo "<p class='message'>文件不存在: " . $filePath . "</p>";
            exit;
        }
        ?>

        <!-- 文本区域用于展示和编辑文件内容 -->
        <form action="" method="POST">
            <textarea name="content" rows="20" cols="100"><?php echo $fileContent; ?></textarea>
            <button type="submit">保存修改</button>
            <a href="../tools/md5.php">md5加密工具</a>
        </form>

    </div>

</body>
</html>
