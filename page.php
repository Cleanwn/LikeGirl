<?php
include_once 'admin/Database.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);
@$id = $_GET['id'];
if (is_numeric($id) == $id) {
    $article = "SELECT * FROM article WHERE id=? limit 1";
    $stmt = $conn->prepare($article);
    $stmt->bind_param("i", $id);
    $id = $_GET['id'];
    $stmt->bind_result($id, $articletext, $articletime, $articletitle, $articlename);
    $result = $stmt->execute();
    if (!$result)
        echo "错误信息：" . $stmt->error;
    $stmt->fetch();
} else {
    echo ("<script>alert('参数错误或页面不存在！');history.back();</script>");
}
include_once 'head.php';
?>

<head>
    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?> — <?php echo $text['card1'] ?></title>
</head>

<body>
    <div id="pjax-container">
        <div class="central">
            <div class="title">
            </div>
            <div class="row central central-800">
                <div
                    class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12 <?php if ($text['Animation'] == "1") { ?>animated fadeInUp delay-03s<?php } ?>">
                    <div class="little_texts">
                        <div class="top-title f2"><?php echo $articletitle ?>
                            <svg class="little_icon" aria-hidden="true">
                                <use xlink:href="#icon-zhankai"></use>
                            </svg>
                        </div>
                        <div class="info">
                            <span>
                                <svg class="little_icon" aria-hidden="true">
                                    <use xlink:href="#icon-shoucang"></use>
                                </svg>
                                <?php echo $articlename ?> <i>记录于</i> <?php echo $articletime ?></span>
                        </div>
                        <div class="line-top"></div>
                        <div id="md-view" class="file">
                            <?php echo ($articletext) ?>

                        </div>

                        <div class="line">
                            <p><svg t="1718070705747" class="icon" viewBox="0 0 1024 1024" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" p-id="3409" width="200" height="200">
                                    <path
                                        d="M512 85.3c235.3 0 426.7 191.4 426.7 426.7 0 235.3-191.4 426.7-426.7 426.7S85.3 747.3 85.3 512C85.3 276.7 276.7 85.3 512 85.3m0-64C241 21.3 21.3 241 21.3 512S241 1002.7 512 1002.7 1002.7 783 1002.7 512 783 21.3 512 21.3z"
                                        p-id="3410" fill="#b5b5b5"></path>
                                    <path d="M512 277.3m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" p-id="3411"
                                        fill="#b5b5b5"></path>
                                    <path
                                        d="M512 810.7c-35.3 0-64-28.7-64-64v-256c0-35.3 28.7-64 64-64s64 28.7 64 64v256c0 35.3-28.7 64-64 64z"
                                        p-id="3412" fill="#b5b5b5"></path>
                                </svg>
                                The content ends here.</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include_once 'footer.php';
    ?>

</body>

</html>