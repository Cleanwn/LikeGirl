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
 -->
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8"/>
    <title>警告 非法请求</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>

    <!-- App css -->
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Style/css/loading.css" rel="stylesheet">
</head>

<div id="Loadanimation" style="z-index:999999;">
    <div id="Loadanimation-center">
        <div id="Loadanimation-center-absolute">
            <div class="xccx_object" id="xccx_four"></div>
            <div class="xccx_object" id="xccx_three"></div>
            <div class="xccx_object" id="xccx_two"></div>
            <div class="xccx_object" id="xccx_one"></div>
        </div>
    </div>
</div>
<script src="../Style/jquery/jquery.min.js"></script>
<script>
    $(function () {
        $("#Loadanimation").fadeOut(1000);
    });
</script>

<?php

$file = $_GET['route'];

include_once 'Database.php';
include_once 'Function.php';

if ($file){
    $ipcharu = "insert into warning (ip,gsd,time,file) values (?,?,?,?)";
    $stmt = $conn->prepare($ipcharu);
    $stmt->bind_param("ssss", $ip, $gsd, $time, $file);
    $ip = $_SERVER["REMOTE_ADDR"];
    $gsd = get_ip_city_New($ip);
    $time = gmdate("Y-m-d H:i:s", time() + 8 * 3600);
    $file = $_GET['route'];
    $result = $stmt->execute();
    if (!$result) echo "错误信息：" . $stmt->error;
    $stmt->fetch();
}else{
    die ("<script>alert('参数错误 请注意你的行为');</script");
}

?>

<style>
    .card {
        border-radius: 15px;
    }

    .card-header.pt-4.pb-4.text-center.bg-primary {
        border-radius: 15px 15px 0 0;
    }

    .btn-primary {
        padding: 10px 25px;
        border-radius: 20px;
    }

    .info {
        margin: ;
        margin-bottom: 20px;
        font-size: 1.2rem;
    }
</style>

<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="##">
                                <span
                                        style="color: #fff;font-size: 1.3rem;font-family: '宋体';font-weight: 700;">你的行为已被记录到数据库</span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Like_Girl 5.2.0</h4>
                            <div class="info">温馨提示：请停止你的行为<i style="color: #ff9b9b;"><?php echo $ip ?></i></div>
                        </div>
                        <div class="text-center w-75 m-auto" style="margin-bottom: 40px!important;">
                            <img src="https://img.gejiba.com/images/ff63a429a6fbd20d6748242b182d2159.jpg" style="width: 100%;border-radius: 10px;box-shadow: 0 0 35px 0 rgb(154 161 171 / 25%);">
                        </div>

                        <div class="form-group mb-0 text-center">
                            <a href="https://wpa.qq.com/msgrd?v=3&uin=3439780232&site=qq&menu=yes">
                                <button
                                        class="btn btn-primary" type="submit"> 我有疑问
                                </button>
                            </a>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    Copyright © 2022-<?php echo date("Y") ?> Ki. && <a href="https://blog.kikiw.cn/index.php/archives/52/" target="_blank">Like_Girl</a> All
    Rights Reserved.
</footer>

<!-- App js -->
<script src="/admin/assets/js/app.min.js"></script>
</body>

</html>