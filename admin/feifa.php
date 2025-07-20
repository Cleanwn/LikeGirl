<?php
session_start();
include_once 'Nav.php';
$ipkiki = "select * from warning order by id desc";
$ipki = mysqli_query($connect, $ipkiki);
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
                <h4 class="header-title mb-3 size_18">非法访问列表</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>访问时间</th>
                        <th>非法文件路径</th>
                        <th>IP地址</th>
                        <th>IP归属地</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $SerialNumber = 0;
                    while ($IPinfo = mysqli_fetch_array($ipki)) {
                        $SerialNumber++;
                        ?>
                        <tr>
                            <td>
                                <div class="SerialNumber">
                                    <?php echo $SerialNumber ?>
                                </div>
                            </td>
                            <td>
                                <small class="text-muted"><?php echo $IPinfo['time'] ?></small>
                            </td>
                            <td>
                                <h5><span class="badge badge-success-lighten"> <?php echo htmlspecialchars($IPinfo['file'], ENT_QUOTES, 'UTF-8')  ?></span></h5>
                            </td>
                            <td>
                                <h5>
                                    <span class="badge badge-danger-lighten"><?php if ($IPinfo['ip']) { ?><?php echo $IPinfo['ip'] ?><?php } else { ?>127.0.0.1<?php } ?></span>
                                </h5>
                            </td>
                            <td><?php echo $IPinfo['gsd'] ?></td>
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