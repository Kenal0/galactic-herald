<?php

use app\Core\View;
use app\Models\LastNews;
use app\Services\PaginationRange;


$page = (int)($_GET['page'] ?? 1);
if ($page < 1)
{
    $page = 1;
}

$mainNew = LastNews::getMainNews();
$fourNews = LastNews::getFourNews($page);
$totalPages = LastNews::getTotalPages();

$pagination = PaginationRange::paginationRangeCalculate($page, $totalPages);


View::view("views/index.php", [
    'mainTitle' => $mainNew['title'],
    'mainAnnounce' => $mainNew['announce'],
    'mainImage' => $mainNew['image'],
    'fourNews' => $fourNews,
    'currentPage' => $page,
    'totalPages' => $totalPages,
    '$pagination' => $pagination
]);