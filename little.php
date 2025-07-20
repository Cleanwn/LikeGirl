<?php
include_once 'head.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);
$article = "select * from article order by id desc";
$resarticle = mysqli_query($connect, $article);
?>

<head>
    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?> — <?php echo $text['card1'] ?></title>
</head>

<body>

    <div id="pjax-container">
        <div class="central">
            <div class="title">
                <h1><?php echo $text['deci1'] ?></h1>
            </div>
            <div class="row central central-800">
                <?php
                while ($info = mysqli_fetch_array($resarticle)) {
                    ?>
                    <div
                        class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12 <?php if ($text['Animation'] == "1") { ?>animated fadeInUp delay-03s<?php } ?>">
                        <div class="little_texts">
                            <a href="page.php?id=<?php echo $info['id'] ?>">
                                <div class="top-title textOneHide"><?php echo $info['articletitle'] ?>
                                    <svg class="little_icon" aria-hidden="true">
                                        <use xlink:href="#icon-zhankai"></use>
                                    </svg>
                                </div>
                            </a>
                            <div class="info">
                                <span>
                                    <svg class="little_icon" aria-hidden="true">
                                        <use xlink:href="#icon-shoucang"></use>
                                    </svg>
                                    <?php echo $info['articlename'] ?> <i>记录于</i> <?php echo $info['articletime'] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

</body>

</html>