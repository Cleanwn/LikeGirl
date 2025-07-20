<?php
session_start();
include_once 'Nav.php';
$sql = "select * from picset where id=1";
$query = mysqli_query($connect, $sql);
$config = mysqli_fetch_array($query);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">图库配置</h4>

                <form class="needs-validation" id="customForm">
                    <div class="form-group mb-3">
                        <script>
                            function myOnClickHandler(obj) {
                                obj.value = obj.checked ? "1" : "0";
                                
                            }
                            window.onload = function() {
                                var checkbox = document.getElementById("switch3");
                                checkbox.checked = <?php echo $config['type']?>;
                                myOnClickHandler(checkbox);
                            };
                        </script>
                        <label for="validationCustom01">上传方式</label>
                        <input type="checkbox" name="type" id="switch3" value="1" data-switch="success"
                               onclick="myOnClickHandler(this)" checked>
                        <label id="switchurl" style="display:block;" for="switch3" data-on-label="图床"
                               data-off-label="本地"></label>
                    </div>

                    <!-- <div class="form-group mb-3">
                        <label for="validationCustom01">本地-存储路径</label>
                        <input name="localpath" type="text" class="form-control" id="validationCustom01"
                               placeholder="photos" value="<?php echo $config['localpath']?>" required>
                    </div> -->
                                        
                    <div class="form-group mb-3">
                        <label for="validationCustom01">图床-名称</label>
                        <input name="name" type="text" class="form-control" id="validationCustom01"
                               placeholder="兰空图床" value="<?php echo $config['name']?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="validationCustom01">图床-API地址</label>
                        <input name="api" type="text" class="form-control" id="validationCustom02"
                               placeholder="https://xxx.com/api/v1" value="<?php echo $config['api']?>" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="validationCustom01">图床-接口认证</label>
                        <input name="token" type="password" class="form-control" id="validationCustom03"
                               placeholder="1x|1bJ...CDr1Ob5" value="<?php echo $config['token']?>"  required autocomplete="off">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="validationCustom01">图床-相册ID<span class="margin_left badge badge-success-lighten">（可选）</span></label>
                        <input name="albumId" type="text" class="form-control" id="validationCustom04"
                               placeholder="1xx" value="<?php echo $config['album_id']?>">
                    </div>
                    
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="submit" submit="submit">提交修改</button>
                    </div>
                </form>

            </div> 
        </div>
    </div>
</div>

<script>
document.getElementById('customForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    const typeValue = document.getElementById('switch3').checked ? '1' : '0';
    formData.set('type', typeValue); 

    if (typeValue == '1' && (!formData.get('name') || !formData.get('api') || !formData.get('token'))) {
        toastr["warning"]("信息未填写完整", "LikeGirl");
        return;
    }

    fetch('/admin/photoFunc.php?func=config', {
        method: 'POST',
        body: formData 
    }).then(response => response.json())
      .then(data => {
          if(data.status){
              toastr["success"](data.message, "LikeGirl");
              window.location.href = '/admin/photoManage.php';
          }else{
              toastr["error"](data.message, "LikeGirl");
          }
      })
      .catch(error => {
          console.log(error)
      });
});

</script>

<?php
include_once 'Footer.php';
?>