<?php
/*
 * @Page：数据库预处理连接
 * @Version：Like Girl 5.2.0
 * @Author: Ki.
 * @Date: 2024-11-08 10:00:00
 * @LastEditTime: 2024-11-08
 * @Description: 愿得一人心 白首不相离
 * @Document：https://blog.kikiw.cn/index.php/archives/52/
 * @Copyright (c) 2024 by Ki All Rights Reserved. 
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 */
error_reporting(0);
header("Content-Type:text/html; charset=utf8");
include_once __DIR__.'/Config_DB.php';
$conn = new mysqli($db_address,$db_username,$db_password,$db_name);

if ($conn->connect_error) {
    die("<script>location.href = '../admin/connectDie.php';</script>");
}
$conn->set_charset("utf8mb4");