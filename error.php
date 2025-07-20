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
 * @Message：开发不易 版权信息请保留 
-->

<!DOCTYPE html>
<html lang="zh-CN">
<?php
include_once 'admin/Database.php';
$sql = "select * from IPerror where State=? limit 1";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$ip);
$ip = $_SERVER['REMOTE_ADDR'];
$stmt->bind_result($id,$ipAdd,$Time,$ipkiki,$text);
$result = $stmt->execute();
if(!$result) echo "错误信息：".$stmt->error;
$stmt->fetch();

?>
<head>
    <meta charset="utf-8"/>
    <title>抱歉 您的IP已被封禁</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>

    <!-- App css -->
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Style/css/loading.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
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
<script src="Style/jquery/jquery.min.js"></script>
<script>
    $(function () {
        $("#Loadanimation").fadeOut(1000);
    });
</script>

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

    body {
        font-family: 'Noto Serif SC', serif;
        font-weight: 700;
    }

    span.badge.badge-danger-lighten {
        font-size: 1.1rem;
    }
    span.badge.badge-success-lighten {
        font-size: 1.1rem;
        margin-bottom: 1rem;
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
                                        style="color: #fff;font-size: 1.3rem;font-family: '宋体';font-weight: 700;">你的行为已被记录</span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Like_Girl 5.0.0</h4>
                            <p class="text-muted">善语结善缘 恶语伤人心</p>
                            <p class="text-muted mb-4">
                                <span class="badge badge-success-lighten">封禁时间：
                                <?php if ($Time) { ?><?php echo $Time; ?><?php } else { ?>无 <?php } ?>
                                </span>
                                <span class="badge badge-danger-lighten">封禁原因：
                                <?php if ($text) { ?><?php echo $text; ?><?php } else { ?>您的IP未被封禁 <?php } ?>
                                </span>

                            </p>
                        </div>
                        <div class="text-center w-75 m-auto" style="margin-bottom: 40px!important;">
                            <?php if ($text){?> <img src="https://img.gejiba.com/images/ff63a429a6fbd20d6748242b182d2159.jpg" style="width: 100%;border-radius: 20px;" alt=""> <?php } ?>

                        </div>

                        <div class="form-group mb-0 text-center">
                            <a href="https://wpa.qq.com/msgrd?v=3&uin=3439780232&site=qq&menu=yes">
                                <button
                                        class="btn btn-primary" type="submit"> 申诉解封
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
    Copyright © 2022 Ki. && <a href="https://blog.kikiw.cn/index.php/archives/24/" target="_blank">Like_Girl</a> All
    Rights Reserved.
</footer>

<!-- App js -->
<script src="/admin/assets/js/app.min.js"></script>
</body>

</html>