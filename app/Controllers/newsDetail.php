<?php

use app\Core\View;
use app\Models\LastNews;

$id = (int)$_GET['id'];

$page = (int)($_GET['page'] ?? 1);

$newsDetail = LastNews::getNewsDetail($id);

if ($newsDetail === null) {
    header('Location: /');
    exit();
}

View::view("views/newsDetail.php", [
    'newsDetail' => $newsDetail,
    'currentPage' => $page,
]);