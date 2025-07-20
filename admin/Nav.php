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
 * @Message：开发不易 版权信息请保留 (更改版权可耻 请勿使用本程序)
-->


<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/ipjc.php');
error_reporting(0);
include_once 'connect.php';
include_once 'Function.php';
$sql = "select * from login where user = '" . $_SESSION['loginadmin'] . "' ";
$loginresult = mysqli_query($connect, $sql);
if (mysqli_num_rows($loginresult)) {
    $login = mysqli_fetch_array($loginresult);
} else {
    header("Location:login.php");
    die("<script>alert('参数错误')</script>");
}
$sql = "select * from login";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $login = mysqli_fetch_array($result);
}

$sql = "select * from text";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $text = mysqli_fetch_array($result);
}
$sql = "select * from diySet";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $diy = mysqli_fetch_array($result);
}
?>


<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <title>后台管理 — <?php echo $text['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
    <!-- App css -->
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="/Style/css/loading.css" rel="stylesheet">
    <link href="../Style/toastr/toastr.css" rel="stylesheet">
</head>

<body>

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
    //查询数据
    //留言
    $nub = "select count(id) as shu from leaving";
    $res = mysqli_query($connect, $nub);
    $leav = mysqli_fetch_array($res);
    $shu = $leav['shu'];
    //点点滴滴
    $dian = "select count(id) as dian from article";
    $resdian = mysqli_query($connect, $dian);
    $didi = mysqli_fetch_array($resdian);
    $diannub = $didi['dian'];
    //恋爱清单
    $list = "select count(id) as list from lovelist";
    $reslsit = mysqli_query($connect, $list);
    $listlove = mysqli_fetch_array($reslsit);
    $listnub = $listlove['list'];
    //恋爱相册
    $img = "select count(id) as img from loveImg";
    $resimg = mysqli_query($connect, $img);
    $loveImg = mysqli_fetch_array($resimg);
    $imgnub = $loveImg['img'];
    $adminuser = "admin";
    $adminpw = "love";
    ?>

    <!--顶部栏 Start-->

    <div class="navbar-custom topnav-navbar">
        <div class="container-fluid">

            <!-- LOGO -->
            <a href="/admin/index.php" class="topnav-logo">
                <span class="topnav-logo-lg">
                    <?php echo $text['title'] ?>
                </span>
                <span class="topnav-logo-sm">
                    <?php echo $text['title'] ?>
                </span>
            </a>

            <ul class="list-unstyled topbar-right-menu float-right mb-0">


                <li class="dropdown notification-list">
                    <a class="nav-link right-bar-toggle" href="/admin/user.php">
                        <i class="dripicons-gear noti-icon"></i>
                    </a>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown"
                        id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['userQQ'] ?>&s=640"
                                alt="user-image" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name"><?php echo $text['userName'] ?></span>
                            <span class="account-position">操作</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                        aria-labelledby="topbar-userdrop">


                        <!-- item-->
                        <a href="user.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span>全局设置</span>
                        </a>

                        <!-- item-->
                        <a href="loginOut.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-edit mr-1"></i>
                            <span>退出登录</span>
                        </a>


                    </div>
                </li>

            </ul>
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <div class="app-search">
            </div>
        </div>
    </div>

    <!--顶部栏 End-->


    <div class="container-fluid">

        <div class="wrapper">
            <!--侧边导航栏 Start-->
            <div class="left-side-menu">
                <div class="leftbar-user">
                    <a href="#">
                        <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['userQQ'] ?>&s=640" alt="user-image"
                            height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name"><?php echo $text['title'] ?></span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav">

                    <li class="side-nav-item">
                        <a href="/admin/index.php" class="side-nav-link">
                            <i class="dripicons-direction"></i>
                            <span> 后台首页 </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/Set.php" class="side-nav-link">
                            <i class="dripicons-meter"></i>
                            <span class="badge badge-success float-right"><i class="dripicons-gear margin_0"></i></span>
                            <span> 基本设置 </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/leavSet.php" class="side-nav-link">
                            <i class="dripicons-view-apps"></i>
                            <span> 留言管理
                                <span class="badge badge-danger float-right"><?php echo $shu ?></span>
                            </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/littleSet.php" class="side-nav-link">
                            <i class="dripicons-copy"></i>
                            <span> 点点滴滴
                                <span class="badge badge-danger float-right"><?php echo $diannub ?></span>
                            </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/loveImgSet.php" class="side-nav-link">
                            <i class="dripicons-photo-group"></i>
                            <span> 恋爱相册
                                <span class="badge badge-danger float-right"><?php echo $imgnub ?></span>
                            </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/lovelist.php" class="side-nav-link">
                            <i class="dripicons-location"></i>
                            <span> 恋爱清单
                                <span class="badge badge-danger float-right"><?php echo $listnub ?></span>
                            </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/aboutSet.php" class="side-nav-link">
                            <i class="dripicons-tags"></i>
                            <span> 关于页面</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/ipList.php" class="side-nav-link">
                            <i class="dripicons-location"></i>
                            <span> IP/拉黑</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/feifa.php" class="side-nav-link">
                            <i class="dripicons-time-reverse"></i>
                            <span> 非法访问</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="/admin/Like_Girl.php" class="side-nav-link">
                            <i class="dripicons-information"></i>
                            <span> 关于Like Girl</span>
                            <span class="menu-arrow"></span>
                        </a>
                    </li>
                </ul>


                <!-- Help Box -->
                <div class="help-box text-center">
                    <a href="javascript: void(0);" class="float-right close-btn text-body">
                        <i class="mdi mdi-close"></i>
                    </a>
                    <img src="assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
                    <h5 class="mt-3">Like_Girl V5.2.0</h5>
                    <p class="mb-3">愿得一人心 白首不相离</p>
                    <a href="https://blog.kikiw.cn/index.php/archives/65/" target="_blank" class="btn btn-outline-primary btn-sm">购买Pro版本</a>
                </div>
                <!-- end Help Box -->
                <!-- End Sidebar -->


                <div class="clearfix"></div>
                <!-- Sidebar -left -->
            </div>
            <!--侧边导航栏 End-->
            <!--内容页面 Start-->
            <div class="content-page">
                <!--内容 Start-->
                <div class="content">

                    <style>
                        .textHide {
                            width: 300px;
                            white-space: normal;
                        }

                        .textHide.index {
                            overflow: hidden;
                            text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 2;
                        }


                        .toast-title {
                            font-size: 1.1rem;
                            margin-bottom: .3rem;
                        }

                        .color {
                            color: #999;
                        }

                        .form-control:focus {
                            border-color: #ff5295;
                        }

                        .form-control {
                            color: #b6b6b6;
                        }

                        .side-nav .side-nav-link i {
                            height: 20px;
                        }

                        span.badge.badge-danger-lighten {
                            font-size: 0.9rem;
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 400;
                        }

                        span.badge.badge-primary-lighten {
                            font-size: 0.9rem;
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 400;
                        }

                        ul.text {
                            line-height: 2rem;
                            font-size: 0.9rem;
                        }

                        ul {
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 400;
                        }

                        h3.mt-0,
                        h5 {
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 700;
                        }

                        .hhtext {
                            white-space: normal !important;
                        }

                        .notification-list .dropdown-menu.dropdown-menu-right {
                            border-radius: 0px 0px 10px 10px;
                            box-shadow: 0 8px 12px #efefef;
                        }

                        button.btn.btn-success.mb-2.mr-2 {
                            border-radius: 10px;
                        }

                        .badge-success-lighten {
                            font-size: 0.9rem;
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 400;
                            padding: 0.4rem;
                        }

                        i {
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 400;
                        }

                        .form-group.col-sm-4 {
                            margin-left: 0;
                            padding-left: 0;
                        }

                        #spotlight .header div {
                            padding-right: 40px;
                        }

                        div#test-editor {
                            z-index: 10;
                        }
                        
                        .editormd-preview video {
                            width: 100%;
                        }

                        .table td,
                        .table th {
                            padding: 0.95rem;
                            vertical-align: middle;
                            border-top: 1px solid #e3eaef;
                        }

                        #img_url {
                            display: block;
                        }

                        .margin_0 {
                            margin: 0 !important;
                        }

                        .account-user-name {
                            text-transform: capitalize;
                        }

                        .leftbar-user .leftbar-user-name {
                            margin-left: 0px;
                        }

                        span.topnav-logo-lg,
                        span.topnav-logo-sm {
                            color: #fff;
                            font-size: 1.2rem;
                            text-transform: capitalize;
                        }

                        .card {
                            border-radius: 0.80rem;
                        }

                        .content-page {
                            padding-top: 20px;
                        }

                        h3.my-2.py-1 {
                            font-size: 2rem;
                        }

                        h3.my-2.py-1 i {
                            font-style: normal;
                            font-weight: 200;
                            font-size: 1.2rem;
                            margin-left: 0.5rem;
                        }

                        .row.footer_center {
                            width: 100%;
                            display: flex;
                            justify-content: center;
                            text-align: center;
                        }

                        .topnav-navbar {
                            padding: 0px 30px;
                            margin: 0;
                            min-height: 70px;
                        }

                        button.btn.btn-danger.mb-2.mr-2 {
                            border-radius: 0.4rem;
                        }

                        .table .action-icon:hover {
                            color: #ee7c74;
                        }

                        .form-group.mb-3.text_right {
                            text-align: right;
                        }

                        i.mdi.mdi-account-circle.mr-1.rihjt-0 {
                            margin-right: 0rem !important;
                        }

                        button.btn.btn-primary {
                            border-radius: 0.4rem;
                        }

                        h4.header-title.mb-3 {
                            text-align: center;
                            font-size: 1.2rem;
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 700;
                        }

                        label {
                            font-family: 'Noto Serif SC', serif;
                            font-weight: 400;
                        }

                        h4.header-title.mb-3.size_18 {
                            font-size: 1.8rem;
                        }

                        table.dataTable tbody td.focus,
                        table.dataTable tbody th.focus {
                            outline: none !important;
                            outline-offset: 0;
                            background-color: white;
                        }

                        .text-muted {
                            white-space: nowrap;
                        }

                        .right_10 {
                            margin-left: 10px;
                            border-radius: 0.6rem;
                        }

                        iframe {
                            width: 100%;
                            height: 260px;
                            border-radius: 15px;
                            border: 2px solid #d9d9d9d1;
                            box-shadow: 2px 1px 15px rgb(36 37 38 / 44%);
                        }

                        quote {
                            padding: 5px 0px 5px 15px;
                            width: 100%;
                            display: block;
                            border-left: 3px solid #856f6f;
                            background: #f2f2f2;
                            border-radius: 0px 6px 6px 0px;
                            margin: 15px 0;
                        }

                        default-Code {
                            text-align: center;
                            width: 100%;
                            display: block;
                            color: #ff876c;
                        }

                        .editormd {
                            border-radius: 10px;
                            box-shadow: 0 4px 13px 0 rgb(115 118 120 / 14%);
                            height: 450px !important;
                            margin: 40px 0 !important;
                        }

                        .markdown-body h1 {
                            color: #383838 !important;
                            padding-bottom: 0.3em;
                            font-size: 2.25em;
                            line-height: 1.2;
                            border-bottom: 1px solid #eee;
                        }

                        .margin_left {
                            margin-left: 10px;
                        }

                        body {
                            cursor: url(../Style/cur/cursor.cur), default;
                        }

                        a:hover {
                            cursor: url(../Style/cur/hover.cur), pointer;
                        }

                        @media (min-width: 992px) {
                            .text-lg-right {
                                text-align: left !important;
                            }
                        }

                        @media (max-width: 767.98px) {
                            .navbar-custom {
                                padding: 0px;
                            }

                            .topnav-navbar .topnav-logo {
                                min-width: 50px;
                                display: none;
                            }
                        }
                    </style>

</body>

</html>