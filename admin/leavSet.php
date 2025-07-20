<?php
session_start();
include_once 'Nav.php';

$nub = "select count(id) as shu from leaving";
$res = mysqli_query($connect, $nub);
$leav = mysqli_fetch_array($res);
$shu = $leav['shu'];

include_once 'Database.php';
$liuyan = "SELECT * FROM leaving order by id desc";
$stmt = $conn->prepare($liuyan);
$stmt->bind_result($id, $name, $qq, $text, $time, $ip, $city);
$result = $stmt->execute();
if (!$result)
    echo "错误信息：" . $stmt->error;

?>


<link href="/admin/assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="/admin/assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="/admin/assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="/admin/assets/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css" />


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a class="fabu" href="/admin/leavP.php">
                                <button type="button" class="btn btn-success mb-2 mr-2"><i
                                        class=" mdi mdi-brightness-5"></i> 留言相关设置
                                </button>
                            </a>
                        </div>
                    </div><!-- end col-->
                </div>
                <h4 class="header-title mb-3 size_18">留言管理
                    <button type="button" class="btn btn-secondary btn-sm btn-rounded margin_left">
                        共<b><?php echo $leav['shu'] ?></b>条
                    </button>
                </h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>序号</th>
                            <th>留言内容</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>QQ</th>
                            <th>IP</th>
                            <th style="width: 125px;">Action</th>
                        </tr>
                    </thead>

                    <form class="needs-validation" action="littleupda.php" method="post">
                        <tbody>
                            <?php
                            $SerialNumber = 0;
                            while ($stmt->fetch()) {
                                $SerialNumber++;
                                ?>
                                <tr>
                                    <td>
                                        <div class="SerialNumber">
                                            <?php echo $SerialNumber ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="textHide">
                                            <?php echo $text ?>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?php echo date('Y-m-d H:i:s', $time) ?>
                                            <div class="color"><?php echo time_tran($time) ?></div>
                                        </small>
                                    </td>
                                    <td>
                                        <h5><span class="badge badge-success-lighten"><i
                                                    class="mdi mdi-account-circle mr-1 rihjt-0"></i>
                                                <?php echo $name ?></span>
                                        </h5>
                                    </td>
                                    <td>
                                        <?php echo $qq ?>
                                    </td>
                                    <td>
                                        <h5>
                                            <span
                                                class="badge badge-danger-lighten"><?php echo $ip ? $ip : '127.0.0.1'; ?></span>
                                        </h5>
                                        <i><?php echo $city ? $city : '未知'; ?></i>
                                    </td>
                                    <td>
                                        <a href="javascript:del(<?php echo $id; ?>,'<?php echo $text; ?>');">
                                            <button style="white-space: nowrap;" type="button"
                                                class="btn btn-danger btn-rounded">
                                                <i class=" mdi mdi-delete-empty mr-1"></i>删除
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                </table>
                </form>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<style>
    .table td,
    .table th {
        white-space: nowrap;
    }
</style>
<script>
    function del(id, text) {
        if (confirm('您确认要删除 ' + text + ' 内容吗')) {
            location.href = 'delleav.php?id=' + id + '&text' + text;
        }
    }
</script>

<?php
include_once 'Footer.php';
?>
<!-- third party js -->
<script src="/admin/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="/admin/assets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="/admin/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="/admin/assets/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="/admin/assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="/admin/assets/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="/admin/assets/js/vendor/buttons.html5.min.js"></script>
<script src="/admin/assets/js/vendor/buttons.flash.min.js"></script>
<script src="/admin/assets/js/vendor/buttons.print.min.js"></script>
<script src="/admin/assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="/admin/assets/js/vendor/dataTables.select.min.js"></script>
<!-- third party js ends -->
<!-- demo app -->
<script src="/admin/assets/js/pages/demo.datatable-init.js"></script>
<!-- end demo js-->
</body>

</html>