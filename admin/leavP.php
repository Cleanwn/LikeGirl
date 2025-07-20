<?php
session_start();

include_once 'Nav.php';
$leavSet = "select * from leavSet order by id desc";
$Set = mysqli_query($connect, $leavSet);
$Setinfo = mysqli_fetch_array($Set);


?>
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">前端留言页配置</h4>

                <form class="needs-validation" action="leavPPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">显示最新N条留言
                            <span class="badge badge-danger-lighten"> 请填纯数字 截取数量太多会影响加载速度</span></label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="请输入需要截取的数量 如：20"
                               name="jiequ" value="<?php echo $Setinfo['jiequ'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">拦截违禁词
                            <span class="badge badge-danger-lighten"> 可以填入需要拦截的词语 无需分隔符</span></label>
                        <textarea name="lanjiezf" data-toggle="maxlength" class="form-control" maxlength="225" rows="5"
                                  placeholder="请输入违禁词"><?php echo $Setinfo['lanjiezf'] ?></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="validationCustom05">拦截非法字符
                            <span class="badge badge-danger-lighten"> 暂不支持修改 特殊字符拦截可以防止xss注入 如要修改请到数据库更改</span></label>
                        <textarea data-toggle="maxlength" class="form-control" maxlength="225" rows="5" disabled
                                  placeholder="请输入非法字符（请务必设置 否则无法过滤特殊字符 会存在xss漏洞注入）"><?php echo $Setinfo['lanjie'] ?></textarea>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="button" id="leavPPost">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<?php
include_once 'Footer.php';
?>

</body>
</html>