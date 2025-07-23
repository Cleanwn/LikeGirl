<?php
session_start();
include_once 'connect.php';

//七牛云
require_once __DIR__ . '/qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

$sql = "select * from login where user = '" . $_SESSION['loginadmin'] . "' ";
$loginresult = mysqli_query($connect, $sql);
if (mysqli_num_rows($loginresult)) {} else {
    header("Location:login.php");
    return;
}


try {
    $func = $_GET['func'];
    if (empty($func)) {
        header("Location:404.php");
    }
    
    if($func=='config'){
        $accessKey = $_POST['accessKey'];
        $secretKey = $_POST['secretKey'];
        $api = $_POST['api'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $albumId = isset($_POST['albumId']) ? $_POST['albumId'] : 0; 
        $localpath = $_POST['localpath'];

        $msg = "配置失败";
        $status = false;
        if(filter_var($albumId, FILTER_VALIDATE_INT) || $albumId=='0'){
            $albumId = intval($albumId,10);
            $sql = "update picset set name=?, api=?, accessKey=?, secretKey=?, type=?, album_id=?, localpath=? where id=1";
            $stmt = $connect->prepare($sql);
            $stmt-> bind_param("sssssis", $name, $api, $accessKey, $secretKey, $type, $albumId, $localpath);
            
            if ($stmt->execute()) {
                $msg = "配置成功";
                $status = true;
            } 
        }else{
            $msg = "相册ID必须为数字";
        }
        
        echo json_encode([
            "status" => $status,
            "message" => $msg,
            "data" => null
            ]);
        return;
    }
    
    $sql = "select * from picset where id=1";
    $query = mysqli_query($connect, $sql);
    $config = mysqli_fetch_array($query);
    $accessKey = $config['accessKey'];
    $secretKey = $config['secretKey'];
    $name = $config['name'];
    $api = $config['api'];
    $type = $config['type'];
    $albumId = $config['album_id'];
    $localPath = $config['localpath'];
    
    switch ($func) {
        case 'upload':
            $saveurl = '';
            $date = '';
            
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            $maxFileSize = 10; # 最大上传 10 Mb
            
            if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("未上传文件!");
            }
            $fileName = $_FILES['file']['name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            
            if (!in_array($fileExt, $allowedExtensions)) {
                throw new Exception("不支持的文件格式!");
            }
        
            if ($_FILES['file']['size'] > $maxFileSize * 1024 * 1024) {
                throw new Exception("文件大小超过限制($maxFileSize MB)!");
            }
            
            $filePath = $_FILES['file']['tmp_name'];
            
            if($type == '1'){ // 上传七牛云图床
                // 文件路径
                $key = 'likegirl/' . date('YmdHis') . '_' . uniqid() . '.' . $fileExt;
                
                // 初始化上传
                $auth = new Auth($accessKey, $secretKey);
                $token = $auth->uploadToken($name);
                $uploadMgr = new UploadManager();
                
                list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
                            
                if ($err == null) {
                    $saveurl = $api . $ret['key'];
                    echo json_encode([
                        'status' => true,
                        'message' => '文件上传成功！',
                        'data' =>[
                            'links' =>[
                                'url' => $saveurl
                            ]
                        ]
                    ]);
                } else {
                    throw new Exception("文件存储失败！");
                }

            }else{ // 存储本地
                if (!is_dir($localPath)) {
                    mkdir($localPath, 0755, true);
                }
                
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
                $host = $_SERVER['HTTP_HOST'];
                $baseUrl = $protocol . $host;

                $newFileName = uniqid() . time() . '.' . $fileExt;
                $saveurl = $localPath.'/'.$newFileName;

                if (move_uploaded_file($filePath, $saveurl)) {
                    $saveurl = $baseUrl . '/admin/' . $saveurl;
                    echo json_encode([
                        'status' => true,
                        'message' => '文件上传成功！',
                        'data' =>[
                            'links' =>[
                                'url' => $saveurl
                            ]
                        ]
                    ]);
                } else {
                    throw new Exception("文件存储失败！");
                }
            }
            
            // 写入数据库
            $sql = "INSERT INTO picture (name, url, date) VALUES (?, ?, ?)";
            $stmt = $connect->prepare($sql);
            $date = date('Y-m-d H:i:s'); // 当前时间
            $stmt->bind_param("sss", $fileName, $saveurl, $date);
            $stmt->execute();
            
            return;

        case 'get_img':
            $params = [
                'page' => $_POST['page'] ?? 1, 
                'q' => $_POST['q'] ?? ''
            ];
            
            $offset = max(0, ($params['page'] - 1) * 24);
            $sql = "select id, name, date, url from picture where name LIKE ? order by date desc limit ?, 24";
            $stmt = $connect->prepare($sql); 
            $searchTerm = '%' . $params['q'] . '%';
            $stmt->bind_param("si", $searchTerm, $offset);
            
            if (!$stmt->execute()) {
                throw new Exception("数据查询失败！");
            }
            $result = $stmt->get_result();
            $list = [];
            while ($row = $result->fetch_assoc()) {
                $list[] = [
                    'origin_name' => $row['name'],
                    'date' => $row['date'],
                    'key' => $row['id'],
                    'links' => [
                        'url' => $row['url'] 
                    ]
                ];
            }

            // 统计
            $countSql = "SELECT COUNT(*) as total FROM picture WHERE name LIKE ?";
            $countStmt = $connect->prepare($countSql);
            $searchTerm = '%' . $params['q'] . '%';
            $countStmt->bind_param("s", $searchTerm);
            $countStmt->execute();
            $totalResult = $countStmt->get_result()->fetch_assoc();
            $total = $totalResult['total'];
            $lastPage = max(1, (int)ceil($total / $perPage));
            
            header('Content-Type: application/json');
            echo json_encode([
                'status' => true,
                'message' => '加载成功',
                'data' => [
                    'current_page' => (int)$params['page'],
                    'last_page' => (int)$lastPage,
                    'total' => (int)$total,
                    'data' => $list
                ]
            ]);
            return;
            
        case 'del_img':
            $json_data = file_get_contents('php://input');
            $body = json_decode($json_data, true);

            if (!isset($body['keys']) || !is_array($body['keys'])) {
                throw new Exception("参数错误！");
            }

            $validKeys = [];
            foreach ($body['keys'] as $key) {
                if (is_string($key) && trim($key) !== '') {
                    $validKeys[] = trim($key);
                } elseif (is_int($key)) {
                    $validKeys[] = $key;
                }
            }
            if (empty($validKeys)) {
                throw new Exception("未选择图片");
            }

            try {
                // 事务
                $connect->begin_transaction();
                $placeholders = implode(',', array_fill(0, count($validKeys), '?'));
                
                $selectSql = "SELECT url FROM picture WHERE id IN ($placeholders)";
                $selectStmt = $connect->prepare($selectSql);
                $selectStmt->bind_param(str_repeat('s', count($validKeys)), ...$validKeys);
                $selectStmt->execute();
                $deletedFiles = $selectStmt->get_result()->fetch_all(MYSQLI_ASSOC);
                
                $deleteSql = "DELETE FROM picture WHERE id IN ($placeholders)";
                $deleteStmt = $connect->prepare($deleteSql);
                $deleteStmt->bind_param(str_repeat('s', count($validKeys)), ...$validKeys);
                $deleteStmt->execute();
                
                $connect->commit();
                
                $deletedCount = 0;
                foreach ($deletedFiles as $file) {
                    if (file_exists($file['url'])) {
                        unlink($file['url']);
                    }
                    $deletedCount = $deletedCount+1;
                }
                echo json_encode([
                    'status' => true,
                    'message' => "成功删除 {$deletedCount} 张图片",
                    'data' => $validKeys
                ]);
                
            } catch (Exception $e) {
                // 回滚
                $connect->rollback();
                echo json_encode([
                    'status' => false,
                    'message' => '删除失败！',
                    "data" => null
                ]);
            }
            return;
            
        default:
            header("Location:404.php");
    }

} catch (Exception $e) {
    echo json_encode([
            "status" => false,
            "message" => $e->getMessage(),
            "data" => null
        ]);
}

?>