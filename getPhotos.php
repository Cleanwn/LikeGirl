<?php
header('Content-Type: application/json');

include_once 'admin/connect.php';
include_once 'admin/Function.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 6;
$offset = ($page - 1) * $limit;

// 查询总数
$totalRes = $connect->query("SELECT COUNT(*) as total FROM loveimg");
$total = $totalRes->fetch_assoc()['total'];

// 预处理分页查询
$stmt = $connect->prepare("SELECT imgUrl, imgDatd, imgText FROM loveimg ORDER BY id DESC LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'img' => $row['imgUrl'],
        'date' => $row['imgDatd'],
        'text' => $row['imgText']
    ];
}

echo json_encode([
    'code' => 200,
    'data' => $data,
    'total' => $total,
    'page' => $page,
    'limit' => $limit
]);