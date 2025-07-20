<?php
session_start();
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $sql = "delete from loveImg where id = $id";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo "<script>alert('删除相册成功');location.href = 'loveImgSet.php';</script>";
        } else {
            echo "<script>alert('删除相册失败)';history.back();</script>";
        }
    } else {
        echo "<script>alert('参数错误');history.back();</script>";
    }

} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

