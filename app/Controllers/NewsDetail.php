<?php

namespace app\Controllers;

use App\Core\View;
use App\Models\News;
use App\Core\Request;

class NewsDetail
{
    public function detail(Request): void
    {
        $page = $request->getPage();
        $id = $request->getId();
        $newsDetail = News::getNewsDetail($id);

        if ($newsDetail === null) {
            $this->redirectToHome();
        }

        View::view("views/newsDetail.php", [
            'newsDetail' => $newsDetail,
            'currentPage' => $page,
        ]);
    }

    public function redirectToHome(): void
    {
        header('Location: /');
        exit();
    }
}
