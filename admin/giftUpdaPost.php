<?php
session_start();
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $id = trim($_POST['id']);
    $gift_name = htmlspecialchars(trim($_POST['gift_name']), ENT_QUOTES);
    $gift_description = htmlspecialchars(trim($_POST['gift_description']), ENT_QUOTES);
    $gift_from = htmlspecialchars(trim($_POST['gift_from']), ENT_QUOTES);
    $gift_price = floatval($_POST['gift_price']);
    $gift_time = $_POST['gift_time'];
    $imgUrl = htmlspecialchars(trim($_POST['imgUrl']), ENT_QUOTES);
    
    $sql = "update gifts set gift_name = '$gift_name', gift_description = '$gift_description', gift_from = '$gift_from', gift_price = '$gift_price', gift_time = '$gift_time', imgUrl = '$imgUrl' where id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
} 