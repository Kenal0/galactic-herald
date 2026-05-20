<?php

require_once __DIR__ . '/app/Core/bootstrap.php';

use app\Models\LastNews;
use app\Core\View;



$page = (int)($_GET['page'] ?? 1);
if ($page < 1)
{ $page = 1;
}

$mainNew = LastNews::getMainNew();
$fourNews = LastNews::getFourNews($page);
$totalPages = LastNews::getTotalPages();

$maxVisibleButtons = 3;
$startPage = max(1, $page - intdiv($maxVisibleButtons - 1, 2));
$endPage = min($totalPages, $startPage + $maxVisibleButtons - 1);

if ($endPage - $startPage + 1 < $maxVisibleButtons) {
    $startPage = max(1, $endPage - $maxVisibleButtons + 1);
}

View::view("views/index.php", [
    'mainTitle' => $mainNew['title'],
    'mainAnnounce' => $mainNew['announce'],
    'mainImage' => $mainNew['image'],
    'fourNews' => $fourNews,
    'currentPage' => $page,
    'totalPages' => $totalPages,
    'startPage' => $startPage,
    'endPage' => $endPage,
]);