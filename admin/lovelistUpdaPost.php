<?php
session_start();

$name = htmlspecialchars(trim($_POST['eventname']),ENT_QUOTES);
$icon = $_POST['icon'];
$id = $_POST['id'];
$imgUrl = htmlspecialchars($_POST['imgUrl'],ENT_QUOTES);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';
if (!empty($imgUrl)) {
    $imgUrl = htmlspecialchars($_POST['imgUrl'],ENT_QUOTES);
} else {
    $imgUrl = 0;
}
if (!$icon) {
    $icon = 0;
} else {
    $icon = $_POST['icon'];
}

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update lovelist set eventname = '$name',icon ='$icon',imgurl ='$imgUrl' where id ='$id' ";
    $reslove = mysqli_query($connect, $sql);
    if ($reslove) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
