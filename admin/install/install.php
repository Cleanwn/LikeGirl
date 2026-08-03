<?php
error_reporting(0);

// 获取表单提交的数据
$db_address  = trim($_POST['db_address'] ?? '');
$db_username = trim($_POST['db_username'] ?? '');
$db_password = $_POST['db_password'] ?? '';
$db_name     = trim($_POST['db_name'] ?? '');
$like_code   = trim($_POST['like_code'] ?? '');

// 基础检测
if ( $db_address === '' || $db_username === '' || $db_password === '' || $db_name === '') {
    die("❌ 安装失败，请检查配置后重试！");
}

// 测试数据库连接
$conn = @new mysqli($db_address, $db_username, $db_password, $db_name);
if ($conn->connect_errno) {
    die("❌ 安装失败，请检查配置后重试！");
}

$conn->set_charset("utf8mb4");

// 检查SQL文件
$sql_file = __DIR__ . '/likegirl.sql';
if (!is_file($sql_file)) {
    $conn->close();
    die("❌ 未找到数据库文件！");
}

// 导入SQL数据
$sql = file_get_contents($sql_file);
if (!$conn->multi_query($sql)) {
    $conn->close();
    die("❌ 数据库初始化失败！");
}

// 清理SQL结果
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());


// 生成配置文件路径
$config_path = dirname(__FILE__, 1) . '/../Config_DB.php';

// 安全转义配置内容
$db_address_export  = var_export($db_address, true);
$db_username_export = var_export($db_username, true);
$db_password_export = var_export($db_password, true);
$db_name_export     = var_export($db_name, true);
$like_code_export   = var_export($like_code, true);

$config_content = <<<PHP
<?php

header("Content-Type:text/html; charset=utf8");

// 数据库地址
\$db_address = $db_address_export;

// 数据库用户名
\$db_username = $db_username_export;

// 数据库密码
\$db_password = $db_password_export;

// 数据库名称
\$db_name = $db_name_export;

// 安全码
\$Like_Code = $like_code_export;

PHP;

// 写入配置
if (file_put_contents($config_path, $config_content) === false) {
    $conn->close();
    die("❌ 配置文件写入失败！");
}

$conn->close();

// 跳转到登录页面
header("Location: ../login.php");
exit;

?>