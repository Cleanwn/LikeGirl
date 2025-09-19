<?php
session_start();
include_once 'Nav.php';
$inv_date = date("Y-m-d");
?>

<link rel="stylesheet" href="/admin/assets/css/photo.select.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">新增礼物</h4>

                <form class="needs-validation" action="giftAddPost.php" method="post" onsubmit="return check()" novalidate>
                    <div class="form-group mb-3">
                        <label for="gift_name">礼物名称</label>
                        <input name="gift_name" type="text" class="form-control" placeholder="请输入礼物名称" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gift_description">礼物描述</label>
                        <textarea name="gift_description" class="form-control" rows="3" placeholder="请输入礼物描述" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gift_from">赠送人</label>
                        <input name="gift_from" type="text" class="form-control" placeholder="请输入赠送人姓名" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gift_price">礼物价格</label>
                        <input name="gift_price" type="number" step="0.01" class="form-control" placeholder="请输入礼物价格" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gift_time">赠送时间</label>
                        <input class="form-control col-sm-4" type="datetime-local" name="gift_time" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                    </div>
                    
                    <div class="form-group mb-3" id="img_url">
                        <label for="validationCustom01">图片URL</label>
                        <div class="d-flex align-items-center">
                            <input class="form-control flex-fill mr-2" type="text" name="imgUrl" placeholder="请输入图片URL地址" value="" required>
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
                        <button class="btn btn-primary" type="button" id="giftAddPost">添加礼物</button>
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
        <div class="upload-area d-flex flex-column align-items-center mb-3" id="uploadArea">
          <div id="thumbnailContainer" class="relative">
            <img src="" alt="图片缩略图" id="thumbnailImage" class="thumbnail-image" style="display: none; width: 150px; height: 150px; object-fit: cover; border-radius: 10px; position: relative; z-index: 1;">
            <div class="overlay d-flex flex-column align-items-center justify-content-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); border-radius: 10px; opacity: 0; transition: opacity 0.3s ease;">
            </div>
          </div>
          <input id="fileName" type="text" class="text-center mt-2 no-border" placeholder="拖放文件或点击选择文件" value="" required>
          <span class="text-center mt-2">选择后建议重命名(保留后缀如.png/.jpg)，便于图库查找</span>
        </div>
        <button class="btn btn-primary" type="submit" id="uploadImg">上传图片</button>
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
    let title = document.getElementsByName('imgText')[0].value.trim();
    if (title.length == 0) {
        alert("事件不能为空");
        return false;
    }
}
</script>

<?php include_once 'Footer.php';?>

</body>
</html>