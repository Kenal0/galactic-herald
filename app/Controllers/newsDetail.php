<?php

use app\Core\View;
use app\Models\LastNews;

$id = (int)$_GET['id'];

$newsDetail = LastNews::getNewsDetail($id);

View::view("/views/newsDetail.php", [
    'newsDetail' => $newsDetail,
]);