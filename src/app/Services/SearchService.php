<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchService
{
    public function handle(string $query, int $limit, int $offset): array
    {
        $pdo = DB::connection('mysql')->getPdo();
        $searchable = e(escapeLike($query));
        $locale = app()->getLocale();

        $countSql = "
             SELECT COUNT(*) AS `count` FROM posts AS p
             INNER JOIN post_translations AS pt ON p.id = pt.post_id
             WHERE p.status = 1 AND pt.locale = :locale AND pt.title LIKE '%{$searchable}%'
        ";
        $countSqlStmt = $pdo->prepare($countSql);
        $countSqlStmt->bindValue(':locale', $locale);
        $countSqlStmt->execute();
        $resultCount = $countSqlStmt->fetch(\PDO::FETCH_ASSOC)['count'] ?? 0;

        $sql = "
             SELECT p.id, pt.title, pt.slug, 'post' AS type FROM posts AS p
             INNER JOIN post_translations AS pt ON p.id = pt.post_id
             WHERE p.status = 1 AND pt.locale = :locale AND pt.title LIKE '%{$searchable}%'
             -- UNION
             LIMIT {$limit} OFFSET {$offset}
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':locale', $locale);
        $stmt->execute();

        return [
            'resultCount' => $resultCount,
            'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC),
        ];
    }
}