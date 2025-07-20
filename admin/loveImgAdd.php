<?php
session_start();
include_once 'Nav.php';
$inv_date = date("Y-m-d");
?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">新增图片</h4>

                <form class="needs-validation" action="ImgAddPost.php" method="post" onsubmit="return check()"
                      novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">日期</label>
                        <input class="form-control col-sm-4" id="example-date" type="date" name="imgDatd" class="form-control" placeholder="日期" value="<?php echo $inv_date ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="validationCustom01">图片描述<span class="margin_left badge badge-success-lighten">尽量控制在25个字符以内 </span></label>
                        <input name="imgText" type="text" class="form-control" placeholder="请输入图片描述" value="" required>
                    </div>

                    <div class="form-group mb-3" id="img_url">
                        <label for="validationCustom01">图片URL</label>
                        <input type="text" name="imgUrl" class="form-control" placeholder="请输入图片URL地址" value="" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary"  type="button" id="ImgAddPost">新增相册</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<script>
    function check() {
        let title = document.getElementsByName('imgText')[0].value.trim();
        if (title.length == 0) {
            alert("事件不能为空");
            return false;
        }
    }

</script>

<?php
include_once 'Footer.php';
?>

</body>
</html>