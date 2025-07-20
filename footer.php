<script src="../Style/toastr/toastr.js"></script>
<div id="pjax-container">
    <script>
        $(function () {
            
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

            
            $(".love_img img,.lovelist img,.little_texts img").addClass("spotlight").each(function () {
                this.onclick = function () {
                    return hs.expand(this)
                }
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "rtl": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": 300,
                    "hideDuration": 1000,
                    "timeOut": 5000,
                    "extendedTimeOut": 1000,
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
            });

            window.onscroll = function () {
                let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                if (scrollTop > 500) {
                    $('.wenan').css({
                        'color': '#333333'
                    });
                    $('.alogo').css({
                        'color': '#333333'
                    });
                }

                if (scrollTop < 500) {
                    $('.wenan').css({
                        'color': 'rgb(97 97 97)'
                    });
                    $('.alogo').css({
                        'color': 'rgb(97 97 97)'
                    });
                }
            }

            FunLazy({
                placeholder: "Style/img/Loading2.gif",
                effect: "show",
                strictLazyMode: false,
                useErrorImagePlaceholder: "https://img.gejiba.com/images/dbc7f2562e051afc3c39f916689ba5f0.png"
            })

        })


    </script>
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

        button:disabled {
            background: #888;
            opacity: 0.6;
        }

        .avatar {
            width: 3em;
            height: 3em;
            border-radius: 50%;
            box-shadow: 0 2px 20px #c5c5c575;
            border: 2px solid #fff;
            margin-right: 0.8rem;
        }
    </style>
</div>

<?php if ($icp <> '' || $copy <> ''): ?>
    <div class="footer-warp">
        <div class="footer">
            <?php if ($icp): ?>
                <p><img src="../Style/img/icp.svg"><a href="https://beian.miit.gov.cn/#/Integrated/index" target="_blank"><?php echo $icp ?></a></p>
            <?php endif;
            if ($copy): ?>
                <p><?php echo $copy ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>


<?php echo htmlspecialchars_decode($diy['footerCon'], ENT_QUOTES) ?>