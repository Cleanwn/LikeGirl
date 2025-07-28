<?php

include_once 'admin/connect.php';

$ipchaxun = "select * from IPerror";
$ipres = mysqli_query($connect, $ipchaxun);

while ($IPinfo = mysqli_fetch_array($ipres)) {

    $iplist = $IPinfo['State'];

    $banned_ip = array($iplist);

    $ip = $_SERVER["REMOTE_ADDR"];

    if (in_array(getenv("REMOTE_ADDR"), $banned_ip)) {
        die ("<script>location.href = 'error.php';</script>");

    }
}
