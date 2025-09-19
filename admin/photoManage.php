<?php
session_start();
include_once 'Nav.php';
?>
    
<link rel="stylesheet" href="/admin/assets/css/photo.select.css">
<nav class="navbar navbar-expand-lg  navbar-custom-i">
    <div class="container-fluid">
        <div class="navbar-search d-flex align-items-center">
            <input type="text" class="form-control round-6" placeholder="输入关键字..." id="keywords">
            <button class="btn btn-success round-6" style="width: 4rem" id="btn-search">
                <i class="fas fa-search"></i> 
            </button>
            <button class="btn btn-primary ms-2 round-6" style="width: 4rem" onclick='location.href=("/admin/photoSet.php")' >
                <i class="fas fa-sliders-h"></i>
            </button>
            <button class="btn btn-danger ms-2 round-6" style="width: 4rem" disabled id="btn-del" >
                <i class="fa fa-trash"></i>
            </button>
        </div>

        <div class="navbar-function ms-auto d-flex align-items-center">
            <button class="btn btn-success round-6" id="prevPage">
                <i class="fas fa-chevron-left"></i> 
            </button>
            <span class="mx-2">第<span id="currentPage">0</span>页 / 共<span id="totalPages">0</span>页, 共 <span id="totalCount">0</span> 张</span>
            <button class="btn btn-success round-6" id="nextPage">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button class="btn btn-primary ms-2 round-6" style="width: 4rem"  id="btn-upload" data-toggle="modal" data-target="#uploadModal">
                <i class="fa fa-upload"></i>
            </button>
        </div>
    </div>
</nav>

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

<div class="row" id="imageContainer"></div>

<script src="/admin/assets/js/photo.controller.js"></script>
<script src="/admin/assets/js/photo.upload.js"></script>

<?php
include_once 'Footer.php';
?>

</body>
</html>