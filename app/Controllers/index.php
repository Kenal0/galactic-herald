<?php

use app\Core\View;
use app\Models\LastNews;
use app\Services\PaginationRange;

$totalPages = LastNews::getTotalPages();

$page = (int)($_GET['page'] ?? 1);

if ($page < 1)
{
    $page = 1;
}

if ($page > $totalPages)
{
    $page = $totalPages;
}

$mainNews = LastNews::getMainNews();
$fourNews = LastNews::getFourNews($page);
$pagination = PaginationRange::paginationRangeCalculate($page, $totalPages);

View::view("views/index.php", [
    'mainNews' => $mainNews,
    'fourNews' => $fourNews,
    'currentPage' => $page,
    'totalPages' => $totalPages,
    'pagination' => $pagination,
]);