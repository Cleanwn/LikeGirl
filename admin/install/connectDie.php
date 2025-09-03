<!--
 * @Version：Like Girl 5.2.1-Stable
 * @Author: Ki.
 * @Date: 2025-09-03 00:00:00
 * @LastEditTime: 2025-09-03
 * @Description: 愿得一心人 白头不相离
 * @Document：https://blog.kikiw.cn/index.php/archives/52/
 * @Copyright (c) 2023 - 2025 by Ki All Rights Reserved. 
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
-->

<?php
    include_once __DIR__ . '/../Config_DB.php';
    
    $connect = @mysqli_connect($db_address, $db_username, $db_password, $db_name);
    if ($connect) {
        mysqli_close($connect);
        die("<script>location.href = '../login.php';</script>");
    }
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>数据库配置</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Like Girl 5.2.0" name="description"/>
    <meta content="Coderthemes" name="author"/>

    <!-- App css -->
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Style/css/loading.css" rel="stylesheet">
</head>

<style>
    body {
        line-height: 1;
    }
    
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
        margin-bottom: 20px;
        font-size: 1rem;
    }
    .mar_top{
        margin-top: 20px;
    }
    .btn-success{
        border-radius: 20px;
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
                            <span style="color: #fff;font-size: 1.2rem;">LikeGirl数据库配置</span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <form method="post" action="install.php">
                            <div class="form-group mb-3">
                                <label>数据库地址</label>
                                <input type="text" name="db_address" class="form-control" value="localhost" required>
                            </div>
        
                            <div class="form-group mb-3">
                                <label>数据库用户名</label>
                                <input type="text" name="db_username" class="form-control" value="likegirl" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>数据库名称</label>
                                <input type="text" name="db_name" class="form-control" value="likegirl" required>
                            </div>
        
                            <div class="form-group mb-3">
                                <label>数据库密码</label>
                                <input type="text" name="db_password" class="form-control" required>
                            </div>
        
                            <div class="form-group mb-4">
                                <label>安全码</label>
                                <input type="text" name="like_code" class="form-control" placeholder="内容可空">
                            </div>
        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">保存配置</button>
                            </div>
                        </form>
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
<script src="/Style/jquery/jquery.min.js"></script>
<script src="/Style/pagelir/spotlight.bundle.js"></script>
<script>
    $(function () {
        $("img[src$=jpg],img[src$=gif],img[src$=JPG],img[src$=png],img[src$=jpeg]").addClass("spotlight").each(function () {
            this.onclick = function () {
                return hs.expand(this)
            }
        });
    })
</script>
<!-- App js -->
<script src="/admin/assets/js/app.min.js"></script>
</body>

</html>