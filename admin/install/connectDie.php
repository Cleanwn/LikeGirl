<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>数据库配置</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/admin/assets/css/app.min.css" rel="stylesheet">
    <style>
        html, body {
          height: 100%;
          margin: 0;
        }
        body {
          background: #f8f9fa;
          height: 100%;
          line-height: 1;
          display: flex;
          justify-content: center; /* 水平居中 */
          align-items: center;     /* 垂直居中 */
          padding-bottom: 50px;
        }
        .container {
          height: auto;
        }
        .card {
          border-radius: 15px;
          margin-top: 0;
          box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn {
          border-radius: 20px;
          padding: 10px 25px;
        }
        .form-control {
          border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="text-center mb-4">LikeGirl数据库配置</h3>
                <form method="post" action="install.php">
                    <div class="form-group mb-3">
                        <label>数据库地址</label>
                        <input type="text" name="db_address" class="form-control" value="localhost" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>数据库用户名</label>
                        <input type="text" name="db_username" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label>数据库名称</label>
                        <input type="text" name="db_name" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>数据库密码</label>
                        <input type="text" name="db_password" class="form-control" required>
                    </div>

                    <div class="form-group mb-4">
                    <label>安全码</label>
                    <input type="text" name="like_code" class="form-control" placeholder="内容可空">
                </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">保存配置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-alt">
    Copyright © 2022 Ki. && <a href="https://blog.kikiw.cn/index.php/archives/24/" target="_blank">Like_Girl</a> All
    Rights Reserved.
</footer>

<script src="/admin/assets/js/app.min.js"></script>
</body>
</html>
