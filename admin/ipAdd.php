<?php
session_start();
include_once 'Nav.php';

$ipchaxun = "select * from IPerror";
$ipres = mysqli_query($connect, $ipchaxun);
$IPinfo = mysqli_fetch_array($ipres);
?>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">IP封禁拉黑添加</h4>

                <form class="needs-validation" action="ipAddPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">IP地址</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="请输入需封禁的IP"
                               name="ipdz" value="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">信息备注</label>
                        <input type="text" class="form-control" id="validationCustom05"
                               placeholder="备注IP封禁情况(被封禁的IP会显示此备注内容)" name="bz" value="" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary"  type="button" id="ipAddPost">提交添加</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<?php
include_once 'Footer.php';
?>

</body>
</html>