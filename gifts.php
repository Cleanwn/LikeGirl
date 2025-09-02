<?php
include_once 'head.php';

$giftImg = "select * from gifts order by id desc";
$resImg = mysqli_query($connect, $giftImg);
?>

<head>
    <link rel="stylesheet" href="Style/css/loveImg.css?LikeGirl=<?php echo $version ?>">
    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?> — 礼物墙</title>

</head>

<body>

    <div id="pjax-container">
        <h4 class="text-ce central">收到的每一份礼物都是满满的爱</h4>
        <div class="row central">
            <?php
            while ($list = mysqli_fetch_array($resImg)) {
                ?>
                <div
                    class="img_card col-lg-4 col-md-6 col-sm-12 col-sm-x-12 <?php if ($text['Animation'] == "1") { ?>animated zoomIn delay-03s<?php } ?>">
                    <div class="love_img">
                        <img data-funlazy="<?php echo $list['imgUrl'] ?>" alt="<?php echo $list['gift_description'] ?>"
                            data-description="<?php echo $list['gift_time'] ?>">

                        <div class="words">
                            <span style="font-weight: bold;font-size: 17px"><?php echo $list['gift_name'] ?></span><br>
                            <span style="font-size: 13px"><?php echo $list['gift_description'] ?></span>
                            <i>Date: <?php echo $list['gift_time'] ?></i>
                        </div>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>

</body>

</html>