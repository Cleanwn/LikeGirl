<?php
session_start();

include_once 'Nav.php';
$article = "select * from article order by id desc";
$resarticle = mysqli_query($connect, $article);
?>

<link href="/admin/assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css"/>
<!-- third party css end -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3 size_18">点点滴滴
                    <a class="fabu" href="/admin/littleAdd.php">
                        <button type="button" class="btn btn-success btn-sm right_10">
                            <i class="mdi mdi-circle-edit-outline"></i>新增
                        </button>
                    </a></h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>标题</th>
                        <th>发布时间</th>
                        <th>发布者</th>
                        <th style="width:150px;">操作</th>
                    </tr>
                    </thead>

                    <form class="needs-validation" action="littleupda.php" method="post">
                        <tbody>
                        <?php
                        $SerialNumber = 0;
                        while ($info = mysqli_fetch_array($resarticle)) {
                            $SerialNumber++;
                            ?>
                            <tr>
                                <td>
                                    <div class="SerialNumber">
                                        <?php echo $SerialNumber ?>
                                    </div>
                                </td>
                                <td><?php echo $info['articletitle'] ?></td>
                                <td><?php echo $info['articletime'] ?></td>
                                <td><?php echo $info['articlename'] ?></td>
                                <td>
                                    <a href="modlitt.php?id=<?php echo $info['id'] ?>">
                                        <button type="button" class="btn btn-secondary btn-rounded">
                                            <i class=" mdi mdi-clipboard-text-play-outline mr-1"></i>修改
                                        </button>
                                    </a>
                                    <a href="javascript:del(<?php echo $info['id']; ?>,'<?php echo $info['articletitle']; ?>');">
                                        <button type="button" class="btn btn-danger btn-rounded">
                                            <i class=" mdi mdi-delete-empty mr-1"></i>删除
                                        </button>
                                    </a>
                                    <input name="id" value="<?php echo $info['id']; ?>" type="hidden">

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


<script>
    function del(id, articletitle) {
        if (confirm('您确认要删除标题为 ' + articletitle + ' 的文章吗')) {
            location.href = 'dellitt.php?id=' + id + '&title' + articletitle;
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