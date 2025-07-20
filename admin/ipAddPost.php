<?php
session_start();
$file = $_SERVER['PHP_SELF'];

include_once 'connect.php';
include_once 'Function.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $ip = trim($_POST['ipdz']);
    $bz = trim($_POST['bz']);
    $time = gmdate("Y-m-d H:i:s", time() + 8 * 3600);
    $ipgsd = get_ip_city_New($ip);

    $ipcharu = "insert into IPerror (ipAdd,Time,State,text) values ('$ipgsd','$time','$ip','$bz')";
    $result = mysqli_query($connect, $ipcharu);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
