<?php
// 获取表单提交的数据
$db_address   = $_POST['db_address']   ?? '';
$db_username  = $_POST['db_username']  ?? '';
$db_password  = $_POST['db_password']  ?? '';
$db_name      = $_POST['db_name']      ?? '';
$like_code    = $_POST['like_code']    ?? '';

// 写入配置文件
$config_path = dirname(__FILE__, 1) . '/../Config_DB.php';

$config_content = <<<PHP
<?php

header("Content-Type:text/html; charset=utf8");

// 数据库地址
\$db_address = "{$db_address}";

// 数据库用户名
\$db_username = "{$db_username}";

// 数据库密码
\$db_password = "{$db_password}";

// 数据库名称
\$db_name = "{$db_name}";

// 安全码
\$Like_Code = "{$like_code}";

// 版本号
\$version = 20250101;
PHP;

// 保存配置
if (file_put_contents($config_path, $config_content) === false) {
    die("❌ 无法写入配置文件！");
}

// 尝试连接数据库
$conn = new mysqli($db_address, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("❌ 数据库连接失败：" . $conn->connect_error);
}

// 导入 SQL 文件
$sql_file = __DIR__ . '/likegirl.sql';
if (!file_exists($sql_file)) {
    die("❌ 找不到 likegirl.sql 文件！");
}

$sql = file_get_contents($sql_file);
if (!$conn->multi_query($sql)) {
    die("❌ SQL 导入失败：" . $conn->error);
}

// 清理所有结果
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());

$conn->close();

// 跳转到登录页面
header("Location: ../login.php");
exit;
?>