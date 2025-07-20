<?php
session_start();
include_once 'Nav.php';

$id = $_GET['id'];
include_once 'connect.php';
$loveImg = "select * from loveImg WHERE id=$id limit 1";
$resImg = mysqli_query($connect, $loveImg);
$Imglist = mysqli_fetch_array($resImg);
?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">修改相册—— ID：<?php echo $Imglist['id'] ?></h4>

                <form class="needs-validation" action="ImgUpdaPost.php" method="post" onsubmit="return check()"
                      novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">日期</label>
                        <input class="form-control col-sm-4" id="example-date" type="date" name="imgDatd" class="form-control" placeholder="日期" value="<?php echo $Imglist['imgDatd'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="validationCustom01">图片描述</label>
                        <input name="imgText" type="text" class="form-control" placeholder="请输入图片描述" value="<?php echo $Imglist['imgText'] ?>" required>
                    </div>

                    <div class="form-group mb-3" id="img_url">
                        <label for="validationCustom01">图片URL</label>
                        <input type="text" name="imgUrl" class="form-control" placeholder="请输入图片URL地址" value="<?php echo $Imglist['imgUrl'] ?>" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <input name="id" value="<?php echo $id ?>" type="hidden">
                        <button class="btn btn-primary" type="button" id="ImgUpdaPost">新增相册</button>
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
            alert("描述不能为空");
            return false;
        }
    }


</script>
<?php
include_once 'Footer.php';
?>
</body>
</html>