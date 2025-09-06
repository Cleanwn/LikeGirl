<?php
session_start();
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';
if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {

    $username = trim($_POST['userName']);  // 管理员名称
    $userQQ = trim($_POST['userQQ']);  // 管理员QQ
    $account = trim($_POST['adminName']); //管理员账号
    $password = trim($_POST['pw']);  //管理员密码
    
    
    $Webanimation = trim($_POST['Webanimation']);
    $cssCon = trim($_POST['cssCon']);
    $headCon = htmlspecialchars(trim($_POST['headCon']), ENT_QUOTES);
    $footerCon = htmlspecialchars(trim($_POST['footerCon']), ENT_QUOTES);
    $SCode = trim($_POST['SCode']);
    
    if ($LikeGirl_Code == $SCode) {
        $sql = "update text set userQQ = '$userQQ',userName = '$username',animation = '$Webanimation' ";
        $result = mysqli_query($connect, $sql);
        
        $login_user = $_SESSION['loginadmin'];
        if ($password) {
            $loginsql = "update login set user = '$account', username = '$username', userQQ = '$userQQ', pw ='" . md5($password) . "' where user = '$login_user'";
            session_destroy();
        } else {
            $loginsql = "update login set user = '$account', username = '$username', userQQ = '$userQQ' where user = '$login_user'";
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
        
        $diysql = "update diyset set headCon = '$headCon',footerCon = '$footerCon',cssCon = '$cssCon' ";
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

