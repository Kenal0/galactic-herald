<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\News;
use App\Services\PaginationRange;

class Index
{
    public function index()
    {
        $totalPages = News::getTotalPages();
        $page = (int)($_GET['page'] ?? 1);

        if ($page < 1)
        {
            $page = 1;
        }

        if ($page > $totalPages)
        {
            $page = $totalPages;
        }

        $mainNews = News::getMainNews();
        $fourNews = News::getFourNews($page);
        $pagination = PaginationRange::paginationRangeCalculate($page, $totalPages);

        View::view("views/index.php", [
            'mainNews' => $mainNews,
            'fourNews' => $fourNews,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'pagination' => $pagination,
        ]);
    }
}
