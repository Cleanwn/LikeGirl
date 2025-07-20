<?php
include_once 'head.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);
$lovelist = "select * from lovelist order by id desc";
$reslist = mysqli_query($connect, $lovelist);
$row_count = mysqli_num_rows($reslist);
$hideElement = ($row_count < 1);
?>

<head>
    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?> — 恋爱事件</title>
</head>

<body>
    <div id="pjax-container">
        <div class="central">
            <div class="title">
                <h1>总有些惊奇的际遇 比方说当我遇见你</h1>
            </div>
            <div class="row central central-800">

                <?php if (!$hideElement): ?>
                <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12">
                    <div
                        class="list_texts <?php if ($text['Animation'] == "1") { ?>animated fadeInUp delay-03s<?php } ?>">
                        <div class="lovelist ">
                            <?php
                            while ($list = mysqli_fetch_array($reslist)) {
                                ?>
                                <li class="cike">
                                    <?php if ($list['icon']) { ?><i class="iconfont icon-chenggong2 com"></i> <?php } ?>
                                    <?php if (!$list['icon']) { ?><i class="iconfont icon-chenggong2 air"></i> <?php } ?>
                                    <span><?php echo $list['eventname']; ?></span>
                                    <?php if ($list['imgurl']) { ?>
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-tupian"></use>
                                        </svg><?php } ?>
                                </li>
                                <ul>
                                    <li>
                                        <?php if ($list['imgurl']) { ?>
                                            <img data-funlazy="<?php echo $list['imgurl']; ?>" alt="<?php echo $list['eventname']; ?>"> 
                                        <?php } ?>
                                    </li>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <style>
            .icon {
                width: 1.5em;
                height: 1.5em;
                vertical-align: -0.3em;
                fill: currentColor;
                overflow: hidden;
            }

            li.cike {
                border-bottom: 1px solid #ddd;
            }

            li {
                list-style-type: none;
            }

            .cike:hover {
                cursor: pointer;
                cursor: url(../Style/cur/hover.cur), pointer;
            }
        </style>
        <script>
            $(function () {
                $(".lovelist ul").hide();
                $(".lovelist li").bind("click", function () {
                    $(this).next("ul").slideToggle(500).siblings("ul").slideUp(500);
                })
            })

        </script>
    </div>
    <?php
    include_once 'footer.php';
    ?>

</body>

</html>