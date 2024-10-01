<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理后台</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .card {
            background-color: #f4f4f4;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin-top: 0;
            font-size: 1.2em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card .value {
            font-size: 1.5em;
            font-weight: bold;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>管理后台</h1>
    
    <div class="dashboard">
        <div class="card">
            <h2>系统时间 <span>🕒</span></h2>
            <div id="systemTime" class="value"></div>
        </div>
        <div class="card">
            <h2>服务器IP <span>🖥️</span></h2>
            <div id="serverIP" class="value"></div>
        </div>
        <div class="card">
            <h2>网站域名 <span>🌐</span></h2>
            <div id="domainName" class="value"></div>
        </div>
        <div class="card">
            <h2>访问者IP <span>👤</span></h2>
            <div id="visitorIP" class="value"></div>
        </div>
    </div>

    <a href="settings.php" class="button">跳转到设置页面</a>

    <script>
        function updateSystemTime() {
            const now = new Date();
            document.getElementById('systemTime').textContent = now.toLocaleString('zh-CN');
        }

        function fetchDashboardInfo() {
            fetch('../api/api.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('serverIP').textContent = data.serverIP;
                    document.getElementById('domainName').textContent = data.domainName;
                    document.getElementById('visitorIP').textContent = data.visitorIP;
                })
                .catch(error => {
                    console.error('Error fetching dashboard info:', error);
                    document.getElementById('serverIP').textContent = 'Error';
                    document.getElementById('domainName').textContent = 'Error';
                    document.getElementById('visitorIP').textContent = 'Error';
                });
        }

        // 初始化
        updateSystemTime();
        fetchDashboardInfo();

        // 每秒更新系统时间
        setInterval(updateSystemTime, 1000);

        // 每5分钟刷新一次仪表板信息
        setInterval(fetchDashboardInfo, 300000);
    </script>
</body>
</html>