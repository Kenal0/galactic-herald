<?php

namespace app\Services;

class PaginationRange
{

    public static function paginationRangeCalculate (int $page, int $totalPages)
    {
        $maxVisibleButtons = 3;

        $startPage = max(1, $page - intdiv($maxVisibleButtons - 1, 2));
        $endPage = min($totalPages, $startPage + $maxVisibleButtons - 1);

        if ($endPage - $startPage + 1 < $maxVisibleButtons)
        {
        $startPage = max(1, $endPage - $maxVisibleButtons + 1);
        }

        return [
            'startPage' => $startPage,
            'endPage' => $endPage,
        ];
    }
}