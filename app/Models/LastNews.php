<?php

namespace app\Models;
use app\Core\Database;

class LastNews
{
    public static function getMainNews()
    {
        $db = Database::getInstance()->getConnection();
        return $db->query('SELECT title, announce, image from news ORDER BY date DESC LIMIT 1')
            ->fetch();

    }

    public static function getFourNews(int $page = 1, int $limit = 4): array
    {
        $db = Database::getInstance()->getConnection();

        $offset = ($page - 1) * $limit;

        $sql = 'SELECT id, date, title, announce 
                FROM news 
                ORDER BY date DESC 
                LIMIT :limit OFFSET :offset';

        $stmt = $db->prepare($sql);

        $stmt->execute([
            'limit' => $limit,
            'offset' => $offset
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getTotalPages(int $limit = 4): int
    {
        $db = Database::getInstance()->getConnection();

        $sql = 'SELECT COUNT(*) FROM news';

        $totalNews = (int)$db->query($sql)->fetchColumn();

        return (int)ceil($totalNews / $limit);
    }

    public static function getNewsDetail(int $id) : ?array
    {
        $db = Database::getInstance()->getConnection();

        $sql = 'SELECT id, date, title, announce, content, image 
                FROM news 
                WHERE id = :id';

        $stmt = $db->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}