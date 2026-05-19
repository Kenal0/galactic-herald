<?php

require_once __DIR__ . '/app/Core/bootstrap.php';

use app\Models\LastNew;
use app\Core\View;

$mainNew = LastNew::getMainNew();

View::view("views/index.php", [
    'mainTitle' => $mainNew['title'],
    'mainAnnounce' => $mainNew['announce'],
    'mainImage' => $mainNew['image'],
]);