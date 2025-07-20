<?php
session_start();
include_once 'Nav.php';
$lovelist = "select * from lovelist order by id desc";
$reslist = mysqli_query($connect, $lovelist);
?>


<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css"/>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3 size_18">恋爱清单<a href="/admin/lovelistAdd.php">
                        <button type="button" class="btn btn-success btn-sm right_10">
                            <i class="mdi mdi-circle-edit-outline"></i>新增
                        </button>
                    </a></h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>事件标题</th>
                        <th>完成状态</th>
                        <th>图片预览</th>
                        <th style="width:150px;">操作</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $SerialNumber = 0;
                    while ($list = mysqli_fetch_array($reslist)) {
                        $SerialNumber++;
                        ?>
                        <tr>
                            <td>
                                <div class="SerialNumber">
                                    <?php echo $SerialNumber ?>
                                </div>
                            </td>
                            <td><?php echo $list['eventname'] ?></td>
                            <td><?php if ($list['icon']) { ?> <span class="badge badge-success-lighten">已完成 </span><?php } ?><?php if (!$list['icon']) { ?> <span class="badge badge-danger-lighten">未完成</span> <?php } ?></td>
                            <td><?php if ($list['imgurl']) { ?> <svg t="1718074057742" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6336" width="40" height="40"><path d="M512 512m-512 0a512 512 0 1 0 1024 0 512 512 0 1 0-1024 0Z" fill="#FDEBED" p-id="6337"></path><path d="M642.56 513.28l-140.8 111.36-75.52-60.16L281.6 599.04V371.2c0-28.16 23.04-51.2 51.2-51.2h358.4c28.16 0 51.2 23.04 51.2 51.2v226.56l-99.84-84.48zM371.2 371.2c-21.76 0-38.4 16.64-38.4 38.4s16.64 38.4 38.4 38.4 38.4-16.64 38.4-38.4-16.64-38.4-38.4-38.4z m49.92 220.16l79.36 62.72 142.08-112.64 99.84 88.32V652.8c0 28.16-23.04 51.2-51.2 51.2H332.8c-28.16 0-51.2-23.04-51.2-51.2v-28.16l139.52-33.28z" fill="#EC3A4E" p-id="6338"></path></svg>  <?php } else { ?>暂无图片 <?php } ?></td>
                            <td>
                                <a href="modlist.php?id=<?php echo $list['id'] ?>&icon=<?php echo $list['icon'] ?>&name=<?php echo $list['eventname'] ?>&imgurl=<?php echo $list['imgurl']; ?> ">
                                    <button type="button" class="btn btn-secondary btn-rounded">
                                        <i class=" mdi mdi-clipboard-text-play-outline mr-1"></i>修改
                                    </button>
                                </a>
                                <a href="javascript:del(<?php echo $list['id']; ?>,'<?php echo $list['eventname']; ?>');">
                                    <button type="button" class="btn btn-danger btn-rounded">
                                        <i class=" mdi mdi-delete-empty mr-1"></i>删除
                                    </button>
                                </a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<script>
    function del(id, eventname) {
        if (confirm('您确认要删除内容为 ' + eventname + ' 的事件吗')) {
            location.href = 'dellist.php?id=' + id + '&title' + eventname;
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