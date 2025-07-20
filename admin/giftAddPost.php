<?php
session_start();
$file = $_SERVER['PHP_SELF'];

include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $gift_name = htmlspecialchars(trim($_POST['gift_name']), ENT_QUOTES);
    $gift_description = htmlspecialchars(trim($_POST['gift_description']), ENT_QUOTES);
    $gift_from = htmlspecialchars(trim($_POST['gift_from']), ENT_QUOTES);
    $gift_price = floatval($_POST['gift_price']);
    $gift_time = $_POST['gift_time'];
    $imgUrl = htmlspecialchars(trim($_POST['imgUrl']), ENT_QUOTES);
    
    $charu = "insert into gifts (gift_name, gift_description, gift_from, gift_price, gift_time, imgUrl) values ('$gift_name', '$gift_description', '$gift_from', '$gift_price', '$gift_time', '$imgUrl')";
    $result = mysqli_query($connect, $charu);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
} 