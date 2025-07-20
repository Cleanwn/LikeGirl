<?php
session_start();
include_once 'Nav.php';
?>
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">信息配置</h4>

                <form class="needs-validation" action="userPost.php" method="post" novalidate>
                    <div class="form-group">
                        <label for="validationCustom01">是否开启前端加载动画</label>
                        <select class="form-control" id="example-select" name="Webanimation">
                            <option value="1" <?php  if($text['Animation'] == "1"){ ?> selected <?php } ?>>开启</option>
                            <option value="2" <?php  if($text['Animation'] == "2"){ ?> selected <?php } ?> >关闭</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">管理员Name</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="请输入管理员Name"
                               name="userName" value="<?php echo $text['userName'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">管理员QQ</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="请输入管理员QQ"
                               name="userQQ" value="<?php echo $text['userQQ'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom04">管理员登录账号</label>
                        <?php if ($login['user'] == $adminuser)  {?><span class="badge badge-danger-lighten"style="font-size: 0.8rem;">您的账号为默认账号 请尽快修改</span><?php }else{ ?> <span class="badge badge-success-lighten"style="font-size: 0.8rem;">账号由大小写字母与数字组成</span> <?php } ?>
                        <input type="text" class="form-control"  placeholder="请输入需修改的管理员账号"
                               name="adminName" value="<?php echo $login['user'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">管理员登录密码</label>
                        <?php if ($login['pw'] == md5($adminpw))  {?><span class="badge badge-danger-lighten"style="font-size: 0.8rem;">您的密码为默认密码 请尽快修改</span><?php }else{ ?> <span class="badge badge-success-lighten"style="font-size: 0.8rem;">密码由大小写字母与数字组成</span> <?php } ?>
                        <input class="form-control"  name="pw" type="password" value="" placeholder="不修改请留空">
                    </div>

                    <div class="form-group mb-3">
                        <label for="validationCustom05">自定义前端全局CSS样式
                            <span class="badge badge-primary-lighten">请按CSS格式填写你的代码</span></label>
                        <textarea name="cssCon"  class="form-control"  rows="5"
                                  placeholder=""><?php echo $diy['cssCon'] ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">自定义头部标签
                            <span class="badge badge-primary-lighten">可填写HTML标签 CSS外链</span></label>
                        <textarea name="headCon"  class="form-control"  rows="5"
                                  placeholder=""><?php echo $diy['headCon'] ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">自定义底部标签
                            <span class="badge badge-primary-lighten">可填写HTML标签 js外链</span></label>
                        <textarea name="footerCon"  class="form-control"  rows="5"
                                  placeholder=""><?php echo $diy['footerCon'] ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">安全码</label>
                        <span class="badge badge-danger-lighten"style="font-size: 0.8rem;">修改敏感信息必须填写</span>
                        <input type="password" class="form-control"  name="SCode" value="" placeholder="请输入数据库配置文件安全码">
                    </div>

                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary"  type="button" id="userPost">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->


</div>

<script>
    function check() {
        let adminName = document.getElementsByName('adminName')[0].value.trim();
        let pw = document.getElementsByName('pw')[0].value.trim();
        // 判断adminName长度是否为0 如果为0则提示弹窗
        if (adminName.length == 0) {
            alert("请填写用户名");
            return false;
        }
        let user = /[a-zA-Z0-9]/g;
        let character = new RegExp("[`~!#$^&*()=|{}':;',\\[\\].<>/?~！#￥……&*（）——|{}【】‘；：”“'。，、？]");
        if (character.test(adminName)) {
            alert("用户名含有特殊字符 本次修改已拦截")
            return false;
        }else if (!(user.test(adminName))) {
            alert("用户名只支持数字与英文大小写字母")
            return false;
        }
        if (pw.length >= 1 ){
            if (pw.length <= 6) {
                alert("密码长度需大于六位数")
                return false;
            }
            if (character.test(pw)) {
                alert("密码含有特殊字符为了过滤SQL注入已拦截\n请输入大小写字母与数字组成的密码")
                return false;
            }
        }
    }

</script>

<?php
include_once 'Footer.php';
?>

</body>
</html>