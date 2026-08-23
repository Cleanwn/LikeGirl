<?php
error_reporting(0); // 关闭 PHP 错误报告显示级别
mysqli_report(MYSQLI_REPORT_OFF);   // 关闭 MySQLi 异常模式
header("Content-Type:text/html; charset=utf8");
include_once __DIR__.'/Config_DB.php';

// 检测是否初始化配置
if (empty($db_address) || empty($db_username) || empty($db_password) || empty($db_name)) {
    die("<script>location.href = '../admin/install/connectDie.php';</script>");
}

// 尝试连接数据库
$connect = mysqli_connect($db_address, $db_username, $db_password, $db_name);
$LikeGirl_Code = $Like_Code;
if (!$connect) {
    die("<script>location.href = '../admin/install/connectDie.php';</script>");
}
$connect->set_charset("utf8mb4");