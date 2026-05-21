<?php

namespace app\Models;

use app\Core\Database;

class LastNews
{
    private static ?\PDO $db = null;

    private static function getDb(): \PDO
    {
        if (self::$db === null) {
            self::$db = Database::getInstance()->getConnection();
        }
        return self::$db;
    }

    public static function getMainNews(): array
    {
        return self::getDb()->query('SELECT title, announce, image from news ORDER BY date DESC LIMIT 1')
            ->fetch(\PDO::FETCH_ASSOC);
    }

    public static function getFourNews(int $page = 1, int $limit = 4): array
    {
        $offset = ($page - 1) * $limit;

        $sql = 'SELECT id, date, title, announce 
                FROM news 
                ORDER BY date DESC 
                LIMIT :limit OFFSET :offset';

        $stmt = self::getDb()->prepare($sql);

        $stmt->execute([
            'limit' => $limit,
            'offset' => $offset
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getTotalPages(int $limit = 4): int
    {
        $sql = 'SELECT COUNT(*) FROM news';

        $totalNews = (int)self::getDb()->query($sql)->fetchColumn();

        return (int)ceil($totalNews / $limit);
    }

    public static function getNewsDetail(int $id): array
    {
        $sql = 'SELECT id, date, title, announce, content, image 
                FROM news 
                WHERE id = :id';

        $stmt = self::getDb()->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}