<?php
session_start();
include_once 'Nav.php';

$url = 'https://www.kikiw.cn/Love/likev5.php';
$lines_array = file($url);
$lines_string = implode('', $lines_array);
$userurl = 'https://www.kikiw.cn/Love/userLikeGirl.php';
$userarray = file($userurl);
$userstring = implode('', $userarray);

?>

<style>
    .btn-success {
        border-radius: 10px;
        border: 2px solid #fff;
    }

    .btn-success:hover {
        background-color: 0;
        border-color: 0;
        opacity: 0.7;
    }
</style>
<!-- 
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
 * @Description: 本页面对前端无任何影响 请保留
 * @Description: 如更改后则无法获取最新版本内容等信息
 * @Description: 删除或更改本页信息 无法享用更新版本服务 请慎重考虑！
 -->

<div class="row">

    <div class="col-sm-12">
        <?php echo ($userstring); ?>
    </div>

    <div class="col-md-12">
        <?php echo ($lines_string); ?>
    </div>

</div>

<?php
include_once 'Footer.php';
?>

</body>

</html>