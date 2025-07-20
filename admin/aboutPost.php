<?php
session_start();
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';
if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {

    $id = 1;
    $title = trim($_POST['title']);
    $aboutimg = trim($_POST['aboutimg']);
    $info1 = trim($_POST['info1']);
    $info2 = trim($_POST['info2']);
    $info3 = trim($_POST['info3']);
    $btn1 = trim($_POST['btn1']);
    $btn2 = trim($_POST['btn2']);
    $infox1 = trim($_POST['infox1']);
    $infox2 = trim($_POST['infox2']);
    $infox3 = trim($_POST['infox3']);
    $infox4 = trim($_POST['infox4']);
    $infox5 = trim($_POST['infox5']);
    $infox6 = trim($_POST['infox6']);
    $btnx2 = trim($_POST['btnx2']);
    $infof1 = trim($_POST['infof1']);
    $infof2 = trim($_POST['infof2']);
    $infof3 = trim($_POST['infof3']);
    $infof4 = trim($_POST['infof4']);
    $btnf3 = trim($_POST['btnf3']);
    $infod1 = trim($_POST['infod1']);
    $infod2 = trim($_POST['infod2']);
    $infod3 = trim($_POST['infod3']);
    $infod4 = trim($_POST['infod4']);
    $infod5 = trim($_POST['infod5']);
    
    $sql = "update about set title = '$title',aboutimg = '$aboutimg',info1 = '$info1',info2 = '$info2',info3 = '$info3',btn1 = '$btn1',btn2 = '$btn2',infox1 = '$infox1',infox2 = '$infox2',infox3 = '$infox3',infox4 = '$infox4',infox5 = '$infox5',infox6 = '$infox6',btnx2 = '$btnx2',infof1 = '$infof1',infof2 = '$infof2',infof3 = '$infof3',infof4 = '$infof4',btnf3 = '$btnf3',infod1 = '$infod1',infod2 = '$infod2',infod3 = '$infod3',infod4 = '$infod4',infod5 = '$infod5' where id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "1";
    } else {
        echo "0";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

