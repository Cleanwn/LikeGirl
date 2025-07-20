<?php
include_once 'head.php';
$absql = "SELECT * FROM about";
$resab = mysqli_query($connect, $absql);
$about = mysqli_fetch_array($resab);
?>

<head>

    <meta charset="utf-8" />
    <title><?php echo $text['title'] ?> — <?php echo $text['card3'] ?></title>
</head>

<body>
    <div id="pjax-container">
        <style>
            .central-600 {
                background: url("<?php echo $about['aboutimg'] ?>") no-repeat center top;
                background-size: cover;
            }

            .central {
                padding: 0;
            }
        </style>

        <h4 class="text-ce central">与 <i><?php echo $about['title'] ?> </i>小站对话中...</h4>
        <div class="central central-600">
            <div class="botui-app-container" id="botui-app">
                <bot-ui></bot-ui>
            </div>
        </div>

        <script>
            var botui = new BotUI("botui-app");
            botui.message.bot({
                delay: 200,
                content: "<?php echo $about['info1'] ?>"
            }).then(function () {
                return botui.message.bot({
                    delay: 1000,
                    content: "<?php echo $about['info2'] ?>"
                })
            }).then(function () {
                return botui.message.bot({
                    delay: 1000,
                    content: "<?php echo $about['info3'] ?>"
                })
            }).then(function () {
                return botui.action.button({
                    delay: 1500,
                    action: [{
                        text: "<?php echo $about['btn1'] ?>",
                        value: "and"
                    },
                    {
                        text: "<?php echo $about['btn2'] ?>",
                        value: "gg"
                    }]
                })
            }).then(function (res) {
                if (res.value == "and") {
                    other()
                }
                if (res.value == "gg") {
                    return botui.message.bot({
                        delay: 1500,
                        content: " ![告辞](https://img.gejiba.com/images/4f6983d663bea83530b8ac3a8a6b9220.jpg) "
                    })
                }
            });

            var other = function () {
                botui.message.bot({
                    delay: 1500,
                    content: "<?php echo $about['infox1'] ?>"
                }).then(function () {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infox2'] ?>"
                    })
                }).then(function () {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infox3'] ?>"
                    })
                }).then(function () {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infox4'] ?>"
                    })
                }).then(function () {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infox5'] ?>"
                    })
                }).then(function () {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infox6'] ?>"
                    })
                }).then(function () {
                    return botui.action.button({
                        delay: 1500,
                        action: [{
                            text: "<?php echo $about['btnx2'] ?>",
                            value: "next"
                        }]
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infof1'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infof2'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infof3'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infof4'] ?>"
                    })
                }).then(function () {
                    return botui.action.button({
                        delay: 1500,
                        action: [{
                            text: "<?php echo $about['btnf3'] ?>",
                            value: "next"
                        }]
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infod1'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infod2'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infod3'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infod4'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "<?php echo $about['infod5'] ?>"
                    })
                }).then(function (res) {
                    return botui.message.bot({
                        delay: 1500,
                        content: "本次会话结束..."
                    })
                }).then(function () {
                    return botui.message.bot({
                        delay: 1500,
                        content: "  "
                    })
                });
            }
        </script>
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>

</html>