<?php
session_start();
include_once 'Nav.php';
$gifts = "select * from gifts order by id desc";
$resGifts = mysqli_query($connect, $gifts);
?>

<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css"/>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">礼物管理<a href="/admin/giftAdd.php">
                        <button type="button" class="btn btn-success btn-sm right_10">
                            <i class="mdi mdi-gift"></i>新增礼物
                        </button>
                    </a></h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>礼物名称</th>
                        <th>赠送人</th>
                        <th>价格</th>
                        <th>赠送时间</th>
                        <th style="width:150px;">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $SerialNumber = 0;
                    while ($gift = mysqli_fetch_array($resGifts)) {
                        $SerialNumber++;
                        ?>
                        <tr>
                            <td>
                                <div class="SerialNumber">
                                    <?php echo $SerialNumber ?>
                                </div>
                            </td>
                            <td><?php echo $gift['gift_name'] ?></td>
                            <td><?php echo $gift['gift_from'] ?></td>
                            <td>￥<?php echo $gift['gift_price'] ?></td>
                            <td><?php echo date('Y-m-d H:i:s', strtotime($gift['gift_time'])) ?></td>
                            <td>
                                <a href="giftMod.php?id=<?php echo $gift['id'] ?>">
                                    <button type="button" class="btn btn-secondary btn-rounded">
                                        <i class="mdi mdi-clipboard-text-play-outline mr-1"></i>修改
                                    </button>
                                </a>
                                <a href="javascript:del(<?php echo $gift['id']; ?>,'<?php echo $gift['gift_name']; ?>');">
                                    <button type="button" class="btn btn-danger btn-rounded">
                                        <i class="mdi mdi-delete-empty mr-1"></i>删除
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function del(id, giftName) {
        if (confirm('您确认要删除 ' + giftName + ' 这个礼物吗？')) {
            location.href = 'giftDel.php?id=' + id;
        }
    }
</script>

<?php
include_once 'Footer.php';
?>
<!-- third party js -->
<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="assets/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="assets/js/vendor/buttons.html5.min.js"></script>
<script src="assets/js/vendor/buttons.flash.min.js"></script>
<script src="assets/js/vendor/buttons.print.min.js"></script>
<script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="assets/js/vendor/dataTables.select.min.js"></script>
<!-- third party js ends -->
<!-- demo app -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
<!-- end demo js-->
</body>
</html>