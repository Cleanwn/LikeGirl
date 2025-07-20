<?php
session_start();

$name = htmlspecialchars(trim($_POST['eventname']),ENT_QUOTES);
$file = $_SERVER['PHP_SELF'];
if ($_POST['img'] === 0) {
    $img = 0;
} else {
    $img = htmlspecialchars($_POST['img'],ENT_QUOTES);
}
if ($_POST['icon'] == 1) {
    $icon = 1;
} else {
    $icon = 0;
}

include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $charu = "insert into lovelist (eventname,icon,imgurl) values ('$name','$icon','$img')";
    $result = mysqli_query($connect, $charu);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
