<?php

namespace app\Models;
use app\Core\Database;
use PDO;

class LastNews {
    public static function getMainNew() {
        $db = Database::getInstance()->getConnection();
        return $db->query("SELECT title, announce, image from news ORDER BY date DESC LIMIT 1")->fetch();

    }

    public static function getFourNews(int $page = 1, int $limit = 4): array
    {
        $db = Database::getInstance()->getConnection();

        $offset = ($page - 1) * $limit;

        $sql = "SELECT date, title, announce 
                FROM news 
                ORDER BY date DESC 
                LIMIT :limit OFFSET :offset";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            'limit' => $limit,
            'offset' => $offset
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}