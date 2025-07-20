<?php
session_start();
$file = $_SERVER['PHP_SELF'];

function checkQQ($qq)
{
    if (preg_match("/^[1-9][0-9]{4,}$/", $qq)) {
        return true;
    } else {
        return false;
    }
}

include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $boy = htmlspecialchars(trim($_POST['boy']));
    $girl = htmlspecialchars(trim($_POST['girl']));
    $boyimg = htmlspecialchars(trim($_POST['boyimg']), ENT_QUOTES);
    $girlimg = htmlspecialchars(trim($_POST['girlimg']), ENT_QUOTES);
    $startTime = trim($_POST['startTime']);
    
    if (checkQQ($boyimg) && checkQQ($girlimg)) {
        $sql = "update text set startTime = '$startTime', girlimg = '$girlimg' , boyimg = '$boyimg', girl = '$girl' , boy = '$boy' ";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    } else {
        echo "3";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}