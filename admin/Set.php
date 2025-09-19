<?php
session_start();
include_once 'Nav.php';
?>

<link rel="stylesheet" href="/admin/assets/css/photo.select.css">
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">基本设置</h4>

                <form class="needs-validation" action="adminPost.php" method="post" onsubmit="return check()" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">站点标题</label>
                        <input type="text" class="form-control"  placeholder="请输入站点标题"
                               name="title" value="<?php echo $text['title'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom02">站点LOGO</label>
                        <input type="text" class="form-control" placeholder="请填写站点LOGO文字"
                               name="logo" value="<?php echo $text['logo'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom03">站点文案</label>
                        <input type="text" class="form-control"  placeholder="显示在顶部的文案"
                               name="writing" value="<?php echo $text['writing'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom06">头像背景高斯模糊</label>
                        <select class="form-control" id="example-select" name="WebBlur">
                            <option value="1" <?php  if($diy['Blurkg'] == "1"){ ?> selected <?php } ?>>开启</option>
                            <option value="2" <?php  if($diy['Blurkg'] == "2"){ ?> selected <?php } ?> >关闭</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom07">前端无刷新加载</label>
                        <select class="form-control" id="example-select" name="WebPjax">
                            <option value="1" <?php  if($diy['Pjaxkg'] == "1"){ ?> selected <?php } ?>>开启</option>
                            <option value="2" <?php  if($diy['Pjaxkg'] == "2"){ ?> selected <?php } ?> >关闭</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom08">明月浩空音乐播放器</label>
                        <select class="form-control" id="example-select" name="WebMusic">
                            <option value="1" <?php  if($diy['musickg'] == "1"){ ?> selected <?php } ?>>开启</option>
                            <option value="2" <?php  if($diy['musickg'] == "2"){ ?> selected <?php } ?> >关闭</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom08">Live2D</label>
                        <select class="form-control" id="example-select" name="WebLive2D">
                            <option value="1" <?php  if($diy['live2dkg'] == "1"){ ?> selected <?php } ?>>开启</option>
                            <option value="2" <?php  if($diy['live2dkg'] == "2"){ ?> selected <?php } ?> >关闭</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="button" id="adminPost">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">情侣配置</h4>

                <form class="needs-validation" action="loveadminPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">男主Name</label>
                        <input type="text" class="form-control"  placeholder="请输入男主Name"
                               name="boy" value="<?php echo $text['boy'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom02">女主Name</label>
                        <input type="text" class="form-control" placeholder="请输入女主Name"
                               name="girl" value="<?php echo $text['girl'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom03">男主QQ</label>
                        <input type="text" class="form-control"  placeholder="请输入男主QQ（用于显示头像）"
                               name="boyQQ" value="<?php echo $text['boyQQ'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom04">女主QQ</label>
                        <input type="text" class="form-control"  placeholder="请输入女主QQ（用于显示头像）"
                               name="girlQQ" value="<?php echo $text['girlQQ'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">起始时间</label>
                        <input type="datetime-local" class="form-control"  placeholder="请输入起始时间"
                               name="startTime" value="<?php echo $text['startTime'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <script>
                            function myOnClickHandler(obj) {
                                var input = document.getElementById("switch3");
                                var boyavatarurl = document.getElementById("boy_avatar_url")
                                var girlavatarurl = document.getElementById("girl_avatar_url")
                                if (obj.checked) {
                                    input.setAttribute("value", "1");
                                    boyavatarurl.style.display = "block";
                                    girlavatarurl.style.display = "block";
                                } else {
                                    input.setAttribute("value", "0");
                                    boyavatarurl.style.display = "none";
                                    girlavatarurl.style.display = "none";
                                }
                            }
                            window.onload = function() {
                                var checkbox = document.getElementById("switch3");
                                checkbox.checked = <?php echo $text['customavatar']?>;
                                myOnClickHandler(checkbox);
                            };
                        </script>
                        <label for="validationCustom01">自定义头像</label>
                        <input type="checkbox" name="customavatar" id="switch3" value="0" data-switch="success"
                               onclick="myOnClickHandler(this)" checked>
                        <label id="switchurl" style="display:block;" for="switch3" data-on-label="Yes"
                               data-off-label="No"></label>
                    </div>
                    <div class="form-group mb-3" id="boy_avatar_url">
                        <label for="validationCustom01">男生头像URL</label>
                        <div class="d-flex align-items-center">
                            <input class="form-control flex-fill mr-2" type="text" name="boyimg" placeholder="请输入图片URL地址" value="<?php echo $text['boyimg'] ?>" required>
                            <div class="btn-group" style="width: 220px; display: flex; gap: 10px;">
                                <button class="btn btn-outline-success rounded-8" type="button" data-toggle="modal" data-target="#uploadModal" onclick="ImageController.targetInputName='boyimg'">
                                    <i class="fa fa-upload"></i> 上传
                                </button>
                                <button class="btn btn-outline-danger rounded-8" type="button" data-toggle="modal" data-target="#galleryModal" onclick="ImageController.targetInputName='boyimg'">
                                    <i class="fa fa-images"></i> 图库
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3" id="girl_avatar_url">
                        <label for="validationCustom01">女生头像URL</label>
                        <div class="d-flex align-items-center">
                            <input class="form-control flex-fill mr-2" type="text" name="girlimg" placeholder="请输入图片URL地址" value="<?php echo $text['girlimg'] ?>" required>
                            <div class="btn-group" style="width: 220px; display: flex; gap: 10px;">
                                <button class="btn btn-outline-success rounded-8" type="button" data-toggle="modal" data-target="#uploadModal" onclick="ImageController.targetInputName='girlimg'">
                                    <i class="fa fa-upload"></i> 上传
                                </button>
                                <button class="btn btn-outline-danger rounded-8" type="button" data-toggle="modal" data-target="#galleryModal" onclick="ImageController.targetInputName='girlimg'">
                                    <i class="fa fa-images"></i> 图库
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="button" id="loveadminPost">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">卡片配置&版权配置</h4>

                <form class="needs-validation" action="CardadminPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">背景图片URL地址</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="bgimg" value="<?php echo $text['bgimg'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">卡片1Name</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="card1" value="<?php echo $text['card1'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom02">卡片1描述</label>
                        <input type="text" class="form-control" placeholder="请输入卡片描述"
                               name="deci1" value="<?php echo $text['deci1'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom03">卡片2Name</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="card2" value="<?php echo $text['card2'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom04">卡片2描述</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片描述"
                               name="deci2" value="<?php echo $text['deci2'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">卡片3Name</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="card3" value="<?php echo $text['card3'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">卡片3描述</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片描述"
                               name="deci3" value="<?php echo $text['deci3'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">域名备案号</label>
                        <input type="text" class="form-control"  placeholder="没有请留空" name="icp"
                               value="<?php echo $text['icp'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">站点版权信息</label>
                        <input type="text" class="form-control"  placeholder="请输入站点版权信息"
                               name="Copyright" value="<?php echo $text['Copyright'] ?>" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="button" id="CardadminPost">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
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

<?php
include_once 'Footer.php';
?>

</body>
</html>