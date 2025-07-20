<!--
 * @Author: Ki.
 * @Date: 2022-12-21 07:35:43
 * @LastEditors: Ki.
 * @LastEditTime: 2022-12-21 07:51:06
 * @Description: 愿得一人心 白首不相离
 * Copyright (c) 2022 by Ki All Rights Reserved. 
-->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <title>后台管理登录_Like_Girl</title>
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
        $.ajax({
            url: "https://www.kikiw.cn/Love/likev5.php",
            type: "GET",
            timeout: 5000,
        });
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
                            <span style="color: #fff;font-size: 1.35rem; font-weight:bold">LikeGirl - Login</span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Like_Girl 5.2.0</h4>
                            <p class="text-muted mb-4">愿得一人心 白首不相离</p>
                        </div>

                        <form action="loginPost.php" method="post" onsubmit="return check()">

                            <div class="form-group">
                                <label for="emailaddress">User</label>
                                <input name="adminName" class="form-control" type="text" id="emailaddress" required=""
                                       placeholder="请输入用户名">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="pw" class="form-control" type="password" required="" id="password"
                                       placeholder="请输入密码">
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">记住密码</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> 登录后台</button>
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
<script>
    function check() {
        //获取name数组中的第0个索引 并且去掉空格
        let adminName = document.getElementsByName('adminName')[0].value.trim();
        let pw = document.getElementsByName('pw')[0].value.trim();
        // 判断adminName长度是否为0 如果为0则提示弹窗
        if (adminName.length == 0) {
            alert("请填写用户名");
            return false;
        } else if (pw.length == 0) {
            alert("请填写密码");
            return false;
        }
        let user = /[a-zA-Z0-9]/g;
        let character = new RegExp("[`~!#$^&*()=|{}':;',\\[\\].<>/?~！#￥……&*（）——|{}【】‘；：”“'。，、？]");
        if (character.test(adminName)) {
            alert("用户名含有特殊字符 请重新输入")
            return false;
        }else if (!(user.test(adminName))) {
            alert("用户名只支持数字 英文大小写字母")
            return false;
        }
        
        if (character.test(pw)) {
            alert("密码含有特殊字符 请重新输入")
            return false;
        }
    }

</script>

<footer class="footer footer-alt">
    Copyright © 2022 - <?php echo date('Y'); ?> Ki. & <a href="https://blog.kikiw.cn/index.php/archives/52/" target="_blank">Like_Girl</a> All
    Rights Reserved.
</footer>

<!-- App js -->
<script src="/admin/assets/js/app.min.js"></script>
</body>
</html>
