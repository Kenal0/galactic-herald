<?php

use app\Core\View;
use app\Models\LastNews;

$id = 1;


$newsDetail = LastNews::getNewsDetail($id);

View::view("/views/newsDetail.php", [
    'newsDetail' => $newsDetail,
]);