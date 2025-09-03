<?php
include_once 'head.php';
?>

<head>
    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?></title>
    <link rel="stylesheet" href="Style/css/index.css?LikeGirl=<?php echo $version ?>">
</head>

<body>
    <div id="pjax-container">
        <!-- 时间区域 -->
        <div class="time">
            <span id="span_dt_dt">这是我们一起走过的</span>
            <b id="tian">00天</b>
            <b id="shi">00时</b>
            <b id="fen">00分</b>
            <b id="miao">00秒</b>
        </div>
        <!-- 卡片区域 -->
        <div class="card-wrap">
            <div class="row central">
                <div
                    class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h <?php if ($text['Animation'] == "1") {
                        echo 'animated fadeInUp';
                    } ?>">
                    <img src="Style/img/card/likegirl_card_1.svg">
                    <div class="text">
                        <span><a target="_self" href="little.php"><?php echo $text['card1'] ?></a></span>
                        <p><?php echo $text['deci1'] ?></p>
                    </div>
                </div>
                
                <div
                    class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h <?php if ($text['Animation'] == "1") {
                        echo 'animated fadeInUp';
                    } ?>">
                    <img src="Style/img/card/likegirl_card_2.svg" alt="">
                    <div class="text">
                        <span><a target="_self" href="leaving.php"><?php echo $text['card2'] ?></a></span>
                        <p><?php echo $text['deci2'] ?></p>
                    </div>
                </div>
                
                <div
                    class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h <?php if ($text['Animation'] == "1") {
                        echo 'animated fadeInUp';
                    } ?>">
                    <img src="Style/img/card/likegirl_card_3.svg" alt="">
                    <div class="text">
                        <span><a target="_self" href="about.php"><?php echo $text['card3'] ?></a></span>
                        <p><?php echo $text['deci3'] ?></p>
                    </div>
                </div>
                
                <div
                    class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h <?php if ($text['Animation'] == "1") {
                        echo 'animated fadeInUp';
                    } ?>">
                    <img src="Style/img/card/likegirl_card_4.svg" alt="">
                    <div class="text">
                        <span><a target="_self" href="loveImg.php">恋爱相册</a></span>
                        <p>记录最美瞬间</p>
                    </div>
                </div>
                
                <div
                    class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h <?php if ($text['Animation'] == "1") {
                        echo 'animated fadeInUp';
                    } ?>">
                    <img src="Style/img/card/likegirl_card_5.svg" alt="">
                    <div class="text">
                        <span><a target="_self" href="list.php">恋爱列表</a></span>
                        <p>你我之间的约定</p>
                    </div>
                </div>
                
                <div
                    class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h <?php if ($text['Animation'] == "1") {
                        echo 'animated fadeInUp';
                    } ?>">
                    <img src="Style/img/card/likegirl_card_6.svg" alt="">
                    <div class="text">
                        <span><a target="_self" href="gifts.php">礼物墙</a></span>
                        <p>从玩偶到戒指</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php';?>

</body>

</html>