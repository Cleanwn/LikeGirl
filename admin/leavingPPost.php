<?php
session_start();

$file = $_SERVER['PHP_SELF'];

include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $jiequ = trim($_POST['jiequ']);
    $lanjiezf = htmlspecialchars(trim($_POST['lanjiezf']), ENT_QUOTES);
    
    $sql = "update leavSet set jiequ = '$jiequ',lanjiezf ='$lanjiezf'  ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
