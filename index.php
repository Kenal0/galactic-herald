<?php

require_once __DIR__ . '/app/Core/bootstrap.php';

use app\Models\LastNews;
use app\Core\View;

$mainNew = LastNews::getMainNew();
$fourNews = LastNews::getFourNews();

View::view("views/index.php", [
    'mainTitle' => $mainNew['title'],
    'mainAnnounce' => $mainNew['announce'],
    'mainImage' => $mainNew['image'],
    'fourNews' => $fourNews,
]);