<?php

use app\Core\View;
use app\Models\LastNews;
use app\Services\PaginationRange;

$page = (int)($_GET['page'] ?? 1);
if ($page < 1)
{
    $page = 1;
}

$mainNews = LastNews::getMainNews();
$fourNews = LastNews::getFourNews($page);
$totalPages = LastNews::getTotalPages();
$pagination = PaginationRange::paginationRangeCalculate($page, $totalPages);

View::view("views/index.php", [
    'mainNews' => $mainNews,
    'fourNews' => $fourNews,
    'currentPage' => $page,
    'totalPages' => $totalPages,
    'pagination' => $pagination,
]);