<?php

namespace app\Models;
use app\Core\Database;

class LastNew{
    public static function getMainNew() {
        $db = Database::getInstance()->getConnection();
        return $db->query("SELECT title, announce, image from news ORDER BY date DESC LIMIT 1")->fetch();

    }
}