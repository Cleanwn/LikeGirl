<?php
include_once 'head.php';

$loveImg = "select * from loveImg order by id desc";
$resImg = mysqli_query($connect, $loveImg);
?>

<head>
    <link rel="stylesheet" href="Style/css/loveImg.css?LikeGirl=<?php echo $version ?>">
    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?> — 恋爱相册</title>

</head>

<body>

    <div id="pjax-container">
        <h4 class="text-ce central">记录下你的最美瞬间</h4>
        <div class="row central">
            <?php
            while ($list = mysqli_fetch_array($resImg)) {
                ?>
                <idv
                    class="img_card col-lg-4 col-md-6 col-sm-12 col-sm-x-12 <?php if ($text['Animation'] == "1") { ?>animated zoomIn delay-03s<?php } ?>">
                    <div class="love_img">
                        <img data-funlazy="<?php echo $list['imgUrl'] ?>" alt="<?php echo $list['imgText'] ?>"
                            data-description="<?php echo $list['imgDatd'] ?>">

                        <div class="words">
                            <i>Date：<?php echo $list['imgDatd'] ?></i>
                            <span><?php echo $list['imgText'] ?></span>
                        </div>

                    </div>
                </idv>
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