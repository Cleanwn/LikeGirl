<?php
session_start();

$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $adminName = trim($_POST['adminName']);
    $icp = trim($_POST['icp']);
    $Copyright = trim($_POST['Copyright']);

    $sql = "update text set icp = '$icp', Copyright = '$Copyright' ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('更新成功');location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
