<?php
session_start();
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';
if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {

    $adminName = trim($_POST['adminName']);
    $pw = trim($_POST['pw']);
    $user = trim($_POST['userQQ']);
    $name = trim($_POST['userName']);
    $Webanimation = trim($_POST['Webanimation']);
    $cssCon = trim($_POST['cssCon']);
    $headCon = htmlspecialchars(trim($_POST['headCon']), ENT_QUOTES);
    $footerCon = htmlspecialchars(trim($_POST['footerCon']), ENT_QUOTES);
    $SCode = trim($_POST['SCode']);
    
    if ($LikeGirl_Code == $SCode) {
        $sql = "update text set userQQ = '$user',userName = '$name',animation = '$Webanimation' ";
        $result = mysqli_query($connect, $sql);

        if ($pw) {
            $loginsql = "update login set user = '$adminName' ,pw ='" . md5($pw) . "' where id = 1";
            session_destroy();
        } else {
            $loginsql = "update login set user = '$adminName' where id = 1";
        }
        $loginresult = mysqli_query($connect, $loginsql);
        if ($loginresult) {
            echo "1";
        } else {
            echo "0";
        }
        if ($result) {
            echo "3";
        } else {
            echo "4";
        }
        $diysql = "update diySet set headCon = '$headCon',footerCon = '$footerCon',cssCon = '$cssCon' ";
        $diyresult = mysqli_query($connect, $diysql);
        if ($diyresult) {
            echo "5";
        } else {
            echo "6";
        }
    } else {
        echo "7";
    }

} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

