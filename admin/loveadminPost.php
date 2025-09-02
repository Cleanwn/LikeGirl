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
    $boyQQ = htmlspecialchars(trim($_POST['boyQQ']), ENT_QUOTES);
    $girlQQ = htmlspecialchars(trim($_POST['girlQQ']), ENT_QUOTES);
    $startTime = trim($_POST['startTime']);
    $customavatar = trim($_POST['customavatar']);
    $boyimg = htmlspecialchars(trim($_POST['boyimg']));
    $girlimg = htmlspecialchars(trim($_POST['girlimg']));
    
    if (checkQQ($boyQQ) && checkQQ($girlQQ)) {
        $sql = "update text set startTime = '$startTime', girlQQ = '$girlQQ' , boyQQ = '$boyQQ', girl = '$girl' , boy = '$boy', customavatar = '$customavatar', boyimg = '$boyimg', girlimg = '$girlimg' ";
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