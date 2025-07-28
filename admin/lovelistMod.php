<?php
session_start();
include_once 'Nav.php';
$id = $_GET['id'];
$icon = $_GET['icon'];
$name = $_GET['name'];
$imgurl = $_GET['imgurl'];

?>

<link rel="stylesheet" href="/admin/assets/css/photo.select.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">修改事件—— <?php echo $name ?></h4>

                <form class="needs-validation" action="lovelistUpdaPost.php" method="post" onsubmit="return check()" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">事件标题</label>
                        <input type="text" name="eventname" class="form-control" id="validationCustom01"
                               placeholder="请输入事件标题" value="<?php echo $name ?>" required>
                    </div>
                    <script>
                        function myOnClickHandler(obj) {
                            var input = document.getElementById("switch3");
                            var imgurl = document.getElementById("img_url")
                            console.log(input);
                            if (obj.checked) {
                                console.log("打开");
                                input.setAttribute("value", "1");
                                imgurl.style.display = "block";
                            } else {
                                console.log("关闭");
                                input.setAttribute("value", "0");
                                imgurl.style.display = "none";
                            }
                        }
                    </script>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">完成状态</label>
                        <input type="checkbox" name="icon" id="switch3" <?php if ($icon) { ?> checked<?php } ?>
                               data-switch="success" value="<?php if ($icon) { ?> 1<?php } else { ?>0<?php } ?>"
                               onclick="myOnClickHandler(this)">
                        <label style="display:block;" for="switch3" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                    <div class="form-group mb-3" id="img_url"
                         style="display: <?php if ($icon) { ?> block<?php } else { ?>none<?php } ?>">
                        <label for="validationCustom01">图片URL</label>
                        <div class="d-flex align-items-center">
                            <input class="form-control flex-fill mr-2" type="text" id="validationCustom01" name="imgurl" placeholder="请输入图片地址（没有无需填写）" value="<?php echo $imgurl ?>">
                            <div class="btn-group" style="width: 220px; display: flex; gap: 10px;">
                                <button class="btn btn-outline-success rounded-8" type="button" data-toggle="modal" data-target="#uploadModal">
                                    <i class="fa fa-upload"></i> 上传
                                </button>
                                <button class="btn btn-outline-danger rounded-8" type="button" data-toggle="modal" data-target="#galleryModal">
                                    <i class="fa fa-images"></i> 图库
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3 text_right">
                        <input name="id" value="<?php echo $id ?>" type="hidden">
                        <button class="btn btn-primary" type="button" id="listupda">提交修改</button>
                    </div>
                </form>

            </div> 
        </div> 
    </div>
</div>

<!--上传图片-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="uploadModalLabel">图片上传</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center">
        <div class="upload-area d-flex flex-column align-items-center mb-3">
          <div id="thumbnailContainer" class="relative">
            <img src="" alt="图片缩略图" id="thumbnailImage" class="thumbnail-image" style="display: none; width: 150px; height: 150px; object-fit: cover; border-radius: 10px; position: relative; z-index: 1;">
            <div class="overlay d-flex flex-column align-items-center justify-content-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); border-radius: 10px; opacity: 0; transition: opacity 0.3s ease;">
            </div>
          </div>
          <input id="fileName" type="text" class="text-center mt-2 no-border" placeholder="点击上传框选择文件" value="" required>
          <span class="text-center mt-2">选择后建议重命名(保留后缀如.png/.jpg)，便于图库查找</span>
        </div>
        <button class="btn btn-primary"  type="submit" id="uploadImg">上传图片</button>
      </div>
    </div>
  </div>
</div>
<input type="file" name="imageFile" id="imageFile" accept="image/*" required class="d-none">

<!--图库选择-->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryModalLabel">我的图库</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <nav class="navbar navbar-expand-lg navbar-custom-i">
            <div class="container-fluid">
                <div class="navbar-search d-flex align-items-center">
                    <input type="text" class="form-control" placeholder="输入关键字..." id="keywords">
                    <button class="btn btn-outline-success rounded-8" style="width: 50px" id="btn-search">
                        <i class="fas fa-search"></i> 
                    </button>
                </div>
    
                <div class="navbar-function ms-auto d-flex align-items-center">
                    <button class="btn btn-outline-success rounded-8" id="prevPage">
                        <i class="fas fa-chevron-left"></i> 
                    </button>
                    <span class="mx-2"><span id="currentPage">0</span> / <span id="totalPages">0</span>, 共 <span id="totalCount">0</span></span>
                    <button class="btn btn-outline-success rounded-8" id="nextPage">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </nav>
        <div class="row" id="imageContainer"></div>
      </div>
    </div>
  </div>
</div>

<script src="/admin/assets/js/photo.upload.js"></script>
<script src="/admin/assets/js/photo.list.js"></script>

<script>
    function check() {
        let title = document.getElementsByName('eventname')[0].value.trim();
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