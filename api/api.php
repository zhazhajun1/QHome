<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

function get_server_ip() {
    if (!empty($_SERVER['SERVER_ADDR'])) {
        return $_SERVER['SERVER_ADDR'];
    } elseif (!empty($_SERVER['LOCAL_ADDR'])) {
        return $_SERVER['LOCAL_ADDR'];
    } elseif (!empty($_SERVER['SERVER_NAME'])) {
        return gethostbyname($_SERVER['SERVER_NAME']);
    } else {
        // 如果无法获取服务器IP，返回一个占位符
        return '0.0.0.0';
    }
}

$dashboard_info = [
    'systemTime' => date('c'),
    'serverIP' => get_server_ip(),
    'domainName' => $_SERVER['HTTP_HOST'],
    'visitorIP' => $_SERVER['REMOTE_ADDR']
];

echo json_encode($dashboard_info);