<!--
 * @Version：Like Girl 5.2.0
 * @Author: Ki.
 * @Date: 2024-11-08 10:00:00
 * @LastEditTime: 2024-11-08
 * @Description: 愿得一人心 白首不相离
 * @Document：https://blog.kikiw.cn/index.php/archives/52/
 * @Copyright (c) 2024 by Ki All Rights Reserved. 
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责
 * @Message：开发不易 版权信息请保留 (删除/修改作者版权的Dog请勿使用 感谢配合)
-->
<?php
error_reporting(0);
include ("ipjc.php");
include_once ("ip.php");
include_once 'admin/connect.php';
include_once 'admin/Function.php';

$sql = "select * from text";
$result = mysqli_query($connect, $sql);
$text = mysqli_fetch_array($result);

$sql = "select * from diySet";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $diy = mysqli_fetch_array($result);
}

$copy = $text['Copyright'];
$icp = $text['icp'];
$Animation = $text['Animation'];
?>



<script>

    console.log("%c Q & V | 3439780232", "color:#fff;background:#000;padding:8px 15px;font-weight: 700;border-radius:15px");
    console.log("%c Like Girl 5.2.0 | Powered by Ki", "color:#fff;font-weight: 700;background:linear-gradient(270deg,#986fee,#8695e6,#68b7dd,#18d7d3);padding:8px 15px;border-radius:15px");
    

    function setupVideoPlayer(video) {
        var videoContainer = $('<div class="video-container"></div>');
        var playPauseBtn = $('<div class="play-pause-btn"></div>');
    
        var playPauseIcon = `
            <svg t="1730884474730" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                p-id="7671" width="200" height="200">
                <path
                    d="M861.829969 330.562413L391.150271 33.456576A214.465233 214.465233 0 0 0 62.30358 214.751187V809.248813a214.465233 214.465233 0 0 0 328.846691 181.294611l470.679698-297.105837a214.751187 214.751187 0 0 0 0-362.875174z"
                    fill="#ffffff" p-id="7672"></path>
            </svg>
        `;
        playPauseBtn.html(playPauseIcon);
    
        video.wrap(videoContainer);
        video.parent().append(playPauseBtn);
    
        video.attr('controls', false);
    
        video.css({
            'width': '100%',
            'height': 'auto'
        });
    
        playPauseBtn.show();
    
        playPauseBtn.on('click', function(e) {
            e.stopPropagation();
    
            if (video[0].paused) {
                video[0].play();
                playPauseBtn.hide();
            } else {
                video[0].pause();
                playPauseBtn.show();
            }
        });
    
        video.on('click', function() {
            if (video[0].paused) {
                video[0].play();
                playPauseBtn.hide();
            } else {
                video[0].pause();
                playPauseBtn.show();
            }
        });
    }

    function show_date_time() {
        window.setTimeout("show_date_time()", 1000);
        BirthDay = new Date("<?php echo $text['startTime'] ?>");
        today = new Date();
        timeold = (today.getTime() - BirthDay.getTime());
        sectimeold = timeold / 1000;
        secondsold = Math.floor(sectimeold);
        msPerDay = 24 * 60 * 60 * 1000;
        e_daysold = timeold / msPerDay;
        daysold = Math.floor(e_daysold);
        e_hrsold = (e_daysold - daysold) * 24;
        hrsold = Math.floor(e_hrsold);
        e_minsold = (e_hrsold - hrsold) * 60;
        minsold = Math.floor((e_hrsold - hrsold) * 60);
        seconds = Math.floor((e_minsold - minsold) * 60);
        let timeKi = document.getElementById('span_dt_dt');
        if (timeKi !== null) {
            span_dt_dt.innerHTML = "这是我们一起走过的";
            tian.innerHTML = daysold + '天';
            shi.innerHTML = hrsold + '时';
            fen.innerHTML = minsold + '分';
            if (seconds < 10) {
                seconds = "0" + seconds
            }
            miao.innerHTML = seconds + '秒';
        }
    }

    show_date_time();
</script>
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="keywords"
    content="<?php echo $text['title'] ?>,Like Girl 5.2.0,LGNeUi,情侣小站,开源情侣网站,PHP情侣网站,情侣记录,情侣网站,情侣项目,情侣小窝,Love,LikeGirl,Ki,PHP情侣小站,情侣小站使用教程,情侣小站使用文档">
<meta name="discription" content="<?php echo $text['writing'] ?> - Like Girl 5.2.0">
<meta name="author" content="Ki">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../Style/css/leaving.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/css/index.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/css/little.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/css/about.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/css/animate.min.css">
<link rel="stylesheet" href="../Botui/botui.min.css">
<link rel="stylesheet" href="../Botui/botui-theme-default.css">
<link rel="stylesheet" href="../Style/Font/font_list/iconfont.css">
<link rel="stylesheet" href="../Style/css/loveImg.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/css/list.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/toastr/toastr.css?LikeGirl=<?php echo $version ?>">
<link rel="stylesheet" href="../Style/css/loadinglike.css?LikeGirl=<?php echo $version ?>">
<script src="../Style/Font/font_leav/iconfont.js"></script>
<script src="../Style/Font/font_leav/iconfont.js"></script>
<script src="../Botui/botui.min.js"></script>
<script src="../Style/js/vue.min.js"></script>
<script src="../Style/jquery/jquery.min.js"></script>
<script src="../Style/js/jquery.pjax.js" type="text/javascript"></script>
<script src="../Style/pagelir/spotlight.bundle.js"></script>
<script src="../Style/js/funlazy.min.js"></script>
<script src="../Style/js/loading.js?LikeGirl=<?php echo $version ?>"></script>

<?php
echo htmlspecialchars_decode($diy['headCon'], ENT_QUOTES);
if ($diy['Pjaxkg'] == "1"):
    ?>
    <script>
        $(document).pjax('a[target!=_blank]', '#pjax-container', { fragment: '#pjax-container', timeout: 15000 });
        $(document).on('pjax:send', function () {
            NProgress.start();
        });
        $(document).on('pjax:complete', function () {
            $(".love_img img,.lovelist img,.little_texts img").addClass("spotlight");
            NProgress.done();
            FunLazy({
                placeholder: "Style/img/Loading2.gif",
                effect: "show",
                strictLazyMode: false,
                useErrorImagePlaceholder: "https://img.gejiba.com/images/dbc7f2562e051afc3c39f916689ba5f0.png"
            })
            $('.card, .card-b').click(function() {
                var link = $(this).find('a').get(0);
                if (link) {
                    link.click();
                }
            });
            $('#MessageBtn').click(function() {
                var targetOffset = $('#MessageArea').offset().top;
                if ($(window).scrollTop() !== targetOffset) {
                    $('html, body').animate({
                        scrollTop: targetOffset
                    }, 800);
                }
            });
            
            $('video').each(function() {
                var video = $(this);
                setupVideoPlayer(video);
            });
            
        });
    </script>
<?php endif; ?>
<script src="../Style/js/nprogress.js?LikeGirl=<?php echo $version ?>"></script>
<link href="../Style/css/nprogress.css?LikeGirl=<?php echo $version ?>" rel="stylesheet" type="text/css">
<!-- 头部导航条 -->
<div class="header-wrap">
    <div class="header">
        <div class="logo">
            <h1><a class="alogo" href="index.php"><?php echo $text['logo'] ?></a></h1>
        </div>
        <div class="word">
            <span class="wenan"><?php echo $text['writing'] ?></span>
        </div>
    </div>
</div>

<!-- 头像内容 -->
<div class="bg-wrap">
    <div class="bg-img">
        <div class="central central-800">
            <div
                class="middle <?php if ($text['Animation'] == "1") { ?>animated fadeInDown<?php } ?> <?php if ($diy['Blurkg'] == "2") { ?>Blurkg<?php } ?>">
                <div class="img-male">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['boyimg'] ?>&s=640" draggable="false">
                    <span><?php echo $text['boy'] ?></span>
                </div>
                <div class="love-icon">
                    <img src="Style/img/like.svg" draggable="false">
                </div>
                <div class="img-female">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['girlimg'] ?>&s=640" draggable="false">
                    <span><?php echo $text['girl'] ?></span>
                </div>
            </div>
        </div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
</div>


<style>
    .bg-img {
        background: url(<?php echo $text['bgimg'] ?>) no-repeat center !important;
        background-size: cover !important;
    }

    .wenan {
        color: rgb(97 97 97);
        transition: all 0.2s linear;
    }

    .alogo {
        color: rgb(97 97 97);
        transition: all 0.2s linear;
    }

    /* webkit, opera, IE9 （谷歌浏览器）*/
    ::selection {
        background: #6f6f6fc7;
        color: #ffffff;
    }

    /* mozilla firefox（火狐浏览器） */
    ::-moz-selection {
        background: #6f6f6fc7;
        color: #ffffff;
    }

    .delay-03s {
        -webkit-animation-delay: .3s;
        animation-delay: .3s;
    }

    .Blurkg {
        backdrop-filter: blur(0px) !important;
        -webkit-backdrop-filter: blur(0px) !important;
        background: transparent !important;
    }

    .cpt-loading-mask.column {
        background: transparent !important;
    }
</style>
<style>
    <?php echo $diy['cssCon'] ?>
</style>