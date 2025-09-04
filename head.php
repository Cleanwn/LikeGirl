<!--
 * @Version：Like Girl 5.2.1-Stable
 * @Author: Ki.
 * @Date: 2025-09-03 00:00:00
 * @LastEditTime: 2025-09-03
 * @Description: 愿得一心人 白头不相离
 * @Document：https://blog.kikiw.cn/index.php/archives/52/
 * @Copyright (c) 2023 - 2025 by Ki All Rights Reserved. 
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
    
    let currentPage = 1;
    const limit = 6;
    let total = 0;
    
    function createPhotoElement(photo) {
        return `
    
    <div class="img_card col-lg-4 col-md-6 col-sm-12 col-sm-x-12 photo-item">
        <div class="love_img">
            <img class="spotlight" data-funlazy="${photo.img}" alt="${photo.text}" 
                 data-description="${photo.date}">
            
            <div class="words" data-tip="${photo.text}" data-tip-position="top">
                <i>${photo.date}</i>
                <span>${photo.text}</span>
            </div>
        </div>
    </div>
    
        `;
    }
    
    function showPhotos(photos) {
        const $gallery = $('#photoGallery');
        const startIndex = $gallery.children().length;
    
        photos.forEach(photo => {
            const photoElement = createPhotoElement(photo);
            $gallery.append(photoElement);
        });
    
        // 逐张显示动画
        const newItems = $('.photo-item').slice(startIndex);
        newItems.each(function(index) {
            const $item = $(this);
            setTimeout(function() {
                $item.addClass('show');
            }, index * 300);
        });
    }
    
    // 加载照片
    function loadPhotos() {
        const $loading = $('#loading');
        const $loadBtn = $('#loadMoreBtn');
    
        $loading.show();
        $loadBtn.prop('disabled', true);
    
        $.post('getPhotos.php', { page: currentPage, limit: limit }, function(res) {
            if (res.code === 200) {
                total = res.total;
                showPhotos(res.data);
                
                FunLazy({
                    placeholder: "Style/img/Loading2.gif",
                    effect: "show",
                    strictLazyMode: false,
                    useErrorImagePlaceholder: "Style/img/error.svg"
                });
    
                currentPage++;
    
                $loading.hide();
    
                if ($('#photoGallery .photo-item').length >= total) {
                    $loadBtn.html(`
                    <svg t="1756817423631" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="20662" width="256" height="256"><path d="M866.944 256.768c-95.488-95.488-250.496-95.488-345.984 0l-13.312 13.312-9.472-9.472c-93.824-93.824-246.656-100.736-343.68-10.368-101.888 94.976-104.064 254.592-6.4 352.256l13.568 13.568 299.264 299.264c25.728 25.728 67.584 25.728 93.44 0l312.576-312.576c95.488-95.488 95.488-250.368 0-345.984zM335.36 352.64c-20.48 0-40.832 6.016-56.704 18.944a85.4912 85.4912 0 0 0-6.912 126.976c9.984 9.984 9.984 26.24 0 36.224l-3.2 3.2c-8.192 8.192-21.632 8.192-29.952 0-52.608-52.608-57.216-138.496-6.528-192.896 26.112-28.032 61.952-43.52 100.096-43.52 14.08 0 25.6 11.52 25.6 25.6v3.072c0 12.416-9.984 22.4-22.4 22.4z" fill="#333333" p-id="20663"></path></svg>
                    暂无更多数据
                    `).prop('disabled', true);
                } else {
                    $loadBtn.prop('disabled', false);
                }
            } else {
                $loading.hide();
                $loadBtn.prop('disabled', false);
            }
        }, 'json');
    }
    
        
        
        function initLoveAlbum() {
            const $gallery = $('#photoGallery');
            if ($gallery.length === 0) {
                return;
            }
    
            // 重置
            currentPage = 1;
            total = 0;
            $('#photoGallery').empty();
                $('#loadMoreBtn').html(`
                                <svg t="1756817125714" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4311" width="256" height="256"><path d="M849.799529 168.357647A481.882353 481.882353 0 1 0 993.882353 512a90.352941 90.352941 0 0 0-180.705882 0 301.176471 301.176471 0 1 1-90.051765-214.799059 90.352941 90.352941 0 1 0 126.674823-128.843294z" p-id="4312"></path></svg>
                  加载更多
                  `).prop('disabled', false);
        
            // 首次加载
            loadPhotos();
        
            $('#loadMoreBtn').off('click').on('click', loadPhotos);
        }
        
        
        
        function initScrollButton(btnSelector, targetSelector, tolerance = 800, duration = 800) {
        const $btn = $(btnSelector);
        const $target = $(targetSelector);
    
        if ($btn.length && $target.length) {
            // 点击按钮滚动到目标
            $btn.on('click', () => {
                const targetOffset = $target.offset().top;
                $('html, body').animate({ scrollTop: targetOffset }, duration);
            });
    
            // 根据滚动位置显示/隐藏按钮
            $(window).on('scroll resize', () => {
                const scrollTop = $(window).scrollTop();
                const targetOffset = $target.offset().top;
    
                if (Math.abs(scrollTop - targetOffset) <= tolerance) {
                    $btn.fadeOut();
                } else {
                    $btn.fadeIn();
                }
            }).trigger('scroll');
        }
    }
    
</script>
<link rel="shortcut icon" href="/favicon.ico" />
<meta name="keywords" content="<?php echo $text['title'] ?>,Like Girl 情侣网站">
<meta name="discription" content="<?php echo $text['writing'] ?> - Like Girl 5.2.0">
<meta name="author" content="Ki">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link href="https://fonts.googleapis.com/css?family=Concert+One|Pacifico" rel="stylesheet">
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
if ($diy['Pjaxkg'] == "1"):?>
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
                useErrorImagePlaceholder: "Style/img/error.svg"
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
            
            initLoveAlbum();

            initScrollButton('#MessageBtn', '#MessageArea', 800, 800);
        });
    </script>
<?php endif; ?>

<script src="../Style/js/nprogress.js?LikeGirl=<?php echo $version ?>"></script>
<link href="../Style/css/nprogress.css?LikeGirl=<?php echo $version ?>" rel="stylesheet" type="text/css">

<!-- 头部导航条 -->
<div class="header-wrap">
    <div class="header">
        <div class="logo">
            <h1><a class="alogo" href="index.php"><?php echo preg_replace('/\{([^}]+)\}/', '<b>$1</b>', $text['logo']) ?></a></h1>
        </div>
        <div class="word" data-tip="<?php echo $text['writing'] ?>" data-tip-position="bottom">
            <span class="wenan"><a href="admin/index.php"><?php echo $text['writing'] ?></a></span>
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
                    <?php if ($text['customavatar'] == "1"): ?>
                        <img src="<?php echo $text['boyimg'] ?: ''; ?>" draggable="false">
                    <?php else: ?>
                        <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['boyQQ'] ?>&s=640" draggable="false">
                    <?php endif; ?>
                    <span><?php echo $text['boy'] ?></span>
                </div>
                <div class="love-icon">
                    <img src="Style/img/like.svg" draggable="false">
                </div>
                <div class="img-female">
                    <?php if ($text['customavatar'] == "1"): ?>
                        <img src="<?php echo $text['girlimg'] ?: ''; ?>" draggable="false">
                    <?php else: ?>
                        <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['girlQQ'] ?>&s=640" draggable="false">
                    <?php endif; ?>
                    <span><?php echo $text['girl'] ?></span>
                </div>
            </div>
        </div>
        
        <!-- 向下滑动提示 -->
        <div class="bottom-hint">
            <div class="hint-text">向下滑动</div>
            <div class="hint-arrow">↓</div>
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

<!-- 明月浩空播放器 -->
<?php if ($diy['musickg'] == "1"):?>
    <script src="https://myhkw.cn/api/player/demo" id="myhk" key="demo" m="1"></script>
<?php endif; ?>

<!-- Live2D -->
<?php if ($diy['live2dkg'] == "1"):?>
    <script src="https://fastly.jsdelivr.net/npm/live2d-widgets@1.0.0-rc.4/dist/autoload.js"></script>
<?php endif; ?>

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