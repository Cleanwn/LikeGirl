<!-- 
 * @Page：异步Ajax请求处理内容新增修改
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
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 * @Message：开发不易 版权信息请保留 （删除/更改版权的无耻之人请勿使用 查到一个挂一个）
 -->
<?php
session_start();
$file = $_SERVER['PHP_SELF'];
if (!isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] == '') {
    die("<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>");
}
?>

<script>
    $("#userPost").click(function () {
        var Webanimation = $("select[name='Webanimation']").val();
        var userName = $("input[name='userName']").val();
        var userQQ = $("input[name='userQQ']").val();
        var adminName = $("input[name='adminName']").val();
        var pw = $("input[name='pw']").val();
        var SCode = $("input[name='SCode']").val();
        var cssCon = $("textarea[name='cssCon']").val();
        var headCon = $("textarea[name='headCon']").val();
        var footerCon = $("textarea[name='footerCon']").val();
        $.ajax({
            url: "userPost.php",
            data: {
                Webanimation: Webanimation,
                userName: userName,
                userQQ: userQQ,
                adminName: adminName,
                pw: pw,
                SCode: SCode,
                cssCon: cssCon,
                headCon: headCon,
                footerCon: footerCon,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 135) {
                    toastr["success"]("更新登录信息成功！", "Like_Girl");
                    toastr["success"]("更新全局信息成功", "Like_Girl");
                    toastr["success"]("更新自定义内容成功", "Like_Girl");
                } else if (res == 046) {
                    toastr["error"]("更新登录信息失败！", "Like_Girl");
                    toastr["error"]("更新全局信息失败！", "Like_Girl");
                    toastr["error"]("更新自定义内容失败！", "Like_Girl");
                } else if (res == 7) {
                    toastr["error"]("安全码错误！", "Like_Girl");
                } else {
                    toastr["error"]("未知错误！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#adminPost").click(function () {
        var title = $("input[name='title']").val();
        var logo = $("input[name='logo']").val();
        var writing = $("input[name='writing']").val();
        var WebBlur = $("select[name='WebBlur']").val();
        var WebPjax = $("select[name='WebPjax']").val();

        $.ajax({
            url: "adminPost.php",
            data: {
                title: title,
                logo: logo,
                writing: writing,
                WebBlur: WebBlur,
                WebPjax: WebPjax,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 13) {
                    toastr["success"]("基本信息修改成功！", "Like_Girl");
                    toastr["success"]("开关设置成功！", "Like_Girl");
                } else if (res == 04) {
                    toastr["error"]("基本信息修改失败！", "Like_Girl");
                    toastr["error"]("开关设置修改失败！", "Like_Girl");
                } else {
                    toastr["error"]("未知错误！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#loveadminPost").click(function () {
        var boy = $("input[name='boy']").val();
        var girl = $("input[name='girl']").val();
        var boyimg = $("input[name='boyimg']").val();
        var girlimg = $("input[name='girlimg']").val();
        var startTime = $("input[name='startTime']").val();

        $.ajax({
            url: "loveadminPost.php",
            data: {
                boy: boy,
                girl: girl,
                boyimg: boyimg,
                girlimg: girlimg,
                startTime: startTime,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("情侣信息修改成功！", "Like_Girl");
                } else if (res == 0) {
                    toastr["error"]("情侣信息修改失败！", "Like_Girl");
                } else if (res == 3) {
                    toastr["error"]("QQ号码格式错误！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })

    $("#CardadminPost").click(function () {
        var bgimg = $("input[name='bgimg']").val();
        var card1 = $("input[name='card1']").val();
        var deci1 = $("input[name='deci1']").val();
        var card2 = $("input[name='card2']").val();
        var deci2 = $("input[name='deci2']").val();
        var card3 = $("input[name='card3']").val();
        var deci3 = $("input[name='deci3']").val();
        var icp = $("input[name='icp']").val();
        var Copyright = $("input[name='Copyright']").val();
        $.ajax({
            url: "CardadminPost.php",
            data: {
                bgimg: bgimg,
                card1: card1,
                deci1: deci1,
                card2: card2,
                deci2: deci2,
                card3: card3,
                deci3: deci3,
                icp: icp,
                Copyright: Copyright,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("卡片信息修改成功！", "Like_Girl");
                } else if (res == 0) {
                    toastr["error"]("卡片信息修改失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })

    $("#leavPPost").click(function () {
        var jiequ = $("input[name='jiequ']").val();
        var lanjiezf = $("textarea[name='lanjiezf']").val();
        $.ajax({
            url: "leavPPost.php",
            data: {
                jiequ: jiequ,
                lanjiezf: lanjiezf,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("留言设置修改成功！", "Like_Girl");
                } else if (res == 0) {
                    toastr["error"]("留言设置修改失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })

    $("#littleupda").click(function () {
        var id = $("input[name='id']").val();
        var articletitle = $("input[name='articletitle']").val();
        var articletext = $("textarea[name='articletext']").val();

        $.ajax({
            url: "littleupda.php",
            data: {
                articletitle: articletitle,
                articletext: articletext,
                id: id,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("文章修改成功！", "Like_Girl");
                    $('#littleupda').text('修改中...');
                    $("#littleupda").attr("disabled", "disabled");
                    setInterval("window.location.href='littleSet.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("文章修改失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#littleAddPost").click(function () {
        var articlename = $("select[name='articlename']").val();
        var articletitle = $("input[name='articletitle']").val();
        var articletext = $("textarea[name='articletext']").val();

        $.ajax({
            url: "littleAddPost.php",
            data: {
                articletitle: articletitle,
                articletext: articletext,
                articlename: articlename,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("新增文章成功！", "Like_Girl");
                    $('#littleAddPost').text('发布中...');
                    $("#littleAddPost").attr("disabled", "disabled");
                    setInterval("window.location.href='littleSet.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("新增文章失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#ImgUpdaPost").click(function () {
        var imgDatd = $("input[name='imgDatd']").val();
        var imgText = $("input[name='imgText']").val();
        var id = $("input[name='id']").val();
        var imgUrl = $("input[name='imgUrl']").val();

        $.ajax({
            url: "ImgUpdaPost.php",
            data: {
                imgDatd: imgDatd,
                imgText: imgText,
                imgUrl: imgUrl,
                id: id,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("相册修改成功！", "Like_Girl");
                    $('#ImgUpdaPost').text('修改中...');
                    $("#ImgUpdaPost").attr("disabled", "disabled");
                    setInterval("window.location.href='loveImgSet.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("相册修改失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#ImgAddPost").click(function () {
        var imgDatd = $("input[name='imgDatd']").val();
        var imgText = $("input[name='imgText']").val();
        var imgUrl = $("input[name='imgUrl']").val();

        $.ajax({
            url: "ImgAddPost.php",
            data: {
                imgDatd: imgDatd,
                imgText: imgText,
                imgUrl: imgUrl,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("新增相册成功！", "Like_Girl");
                    $('#ImgUpdaPost').text('新增中...');
                    $("#ImgUpdaPost").attr("disabled", "disabled");
                    setInterval("window.location.href='loveImgSet.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("新增相册失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#listaddPost").click(function () {
        var eventname = $("input[name='eventname']").val();
        var icon = $("input[name='icon']").val();
        var img = $("input[name='img']").val();

        $.ajax({
            url: "listaddPost.php",
            data: {
                eventname: eventname,
                icon: icon,
                img: img,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("新增事件成功！", "Like_Girl");
                    $('#listaddPost').text('新增中...');
                    $("#listaddPost").attr("disabled", "disabled");
                    setInterval("window.location.href='lovelist.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("新增事件失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#ipAddPost").click(function () {
        var ipdz = $("input[name='ipdz']").val();
        var bz = $("input[name='bz']").val();
        $.ajax({
            url: "ipAddPost.php",
            data: {
                ipdz: ipdz,
                bz: bz,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("IP封禁成功！", "Like_Girl");
                    $('#listupda').text('提交中...');
                    $("#listupda").attr("disabled", "disabled");
                    setInterval("window.location.href='ipList.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("IP封禁失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#listupda").click(function () {
        var eventname = $("input[name='eventname']").val();
        var icon = $("input[name='icon']").val();
        var imgurl = $("input[name='imgurl']").val();
        var id = $("input[name='id']").val();
        $.ajax({
            url: "listupda.php",
            data: {
                eventname: eventname,
                icon: icon,
                imgurl: imgurl,
                id: id,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("修改事件成功！", "Like_Girl");
                    $('#listupda').text('修改中...');
                    $("#listupda").attr("disabled", "disabled");
                    setInterval("window.location.href='lovelist.php'", 1000);
                } else if (res == 0) {
                    toastr["error"]("修改事件失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $("#aboutPost").click(function () {
        var title = $("input[name='title']").val();
        var aboutimg = $("input[name='aboutimg']").val();
        var info1 = $("input[name='info1']").val();
        var info2 = $("input[name='info2']").val();
        var info3 = $("input[name='info3']").val();
        var btn1 = $("input[name='btn1']").val();
        var btn2 = $("input[name='btn2']").val();
        var infox1 = $("input[name='infox1']").val();
        var infox2 = $("input[name='infox2']").val();
        var infox3 = $("input[name='infox3']").val();
        var infox4 = $("input[name='infox4']").val();
        var infox5 = $("input[name='infox5']").val();
        var infox6 = $("input[name='infox6']").val();
        var btnx2 = $("input[name='btnx2']").val();
        var infof1 = $("input[name='infof1']").val();
        var infof2 = $("input[name='infof2']").val();
        var infof3 = $("input[name='infof3']").val();
        var infof4 = $("input[name='infof4']").val();
        var btnf3 = $("input[name='btnf3']").val();
        var infod1 = $("input[name='infod1']").val();
        var infod2 = $("input[name='infod2']").val();
        var infod3 = $("input[name='infod3']").val();
        var infod4 = $("input[name='infod4']").val();
        var infod5 = $("input[name='infod5']").val();

        $.ajax({
            url: "aboutPost.php",
            data: {
                title: title,
                aboutimg: aboutimg,
                info1: info1,
                info2: info2,
                info3: info3,
                btn1: btn1,
                btn2: btn2,
                infox1: infox1,
                infox2: infox2,
                infox3: infox3,
                infox4: infox4,
                infox5: infox5,
                infox6: infox6,
                btnx2: btnx2,
                infof1: infof1,
                infof2: infof2,
                infof3: infof3,
                infof4: infof4,
                btnf3: btnf3,
                infod1: infod1,
                infod2: infod2,
                infod3: infod3,
                infod4: infod4,
                infod5: infod5,
            },
            type: "POST",
            dataType: "text",
            success: function (res) {
                if (res == 1) {
                    toastr["success"]("修改对话配置成功！", "Like_Girl");
                } else if (res == 0) {
                    toastr["error"]("修改对话配置失败！", "Like_Girl");
                }
            },
            error: function (err) {
                toastr["error"]("网络错误 请稍后重试！", "Like_Girl");
            }
        }
        )
    })
    $(function () {
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

    })

</script>