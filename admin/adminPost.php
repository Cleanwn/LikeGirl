<?php
session_start();
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES);
    $logo = htmlspecialchars(trim($_POST['logo']), ENT_QUOTES);
    $writing = htmlspecialchars(trim($_POST['writing']), ENT_QUOTES);
    $WebPjax = trim($_POST['WebPjax']);
    $WebBlur = trim($_POST['WebBlur']);

    $sql = "update text set title = '$title', logo = '$logo' , writing = '$writing' where id = '1'";

    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }


    $diy = "update diySet set Pjaxkg = '$WebPjax' , Blurkg = '$WebBlur' where id = '1'";
    $diyresult = mysqli_query($connect, $diy);
    if ($diyresult) {
        echo "3";
    } else {
        echo "4";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
