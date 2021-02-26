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
             WHERE p.status = 1 AND pt.locale = ? AND (pt.title LIKE '%{$searchable}%' OR pt.content LIKE '%{$searchable}%')
             UNION 
             SELECT COUNT(*) AS `count` FROM products as pr
             LEFT JOIN product_translations AS prt ON pr.id = prt.product_id
             INNER JOIN product_category AS pc ON pc.id = pr.category_id
             WHERE pr.status = 1 AND pr.title LIKE '%{$searchable}%'  
                   OR (prt.locale = ? AND (prt.description LIKE '%{$searchable}%' 
                   OR prt.use_cases_description LIKE '%{$searchable}%'))
        ";
        $countSqlStmt = $pdo->prepare($countSql);
        $countSqlStmt->bindValue(1, $locale);
        $countSqlStmt->bindValue(2, $locale);
        $countSqlStmt->execute();
        $resultCountData = $countSqlStmt->fetchAll(\PDO::FETCH_ASSOC);

        $resultCount = 0;
        foreach ($resultCountData as $item)
            $resultCount += $item['count'];

        $sql = "
             SELECT p.id, pt.title, pt.slug, NULL AS category, 'post' AS type 
             FROM posts AS p
             INNER JOIN post_translations AS pt ON p.id = pt.post_id
             WHERE (p.status = 1) AND (pt.locale = ?) AND (pt.title LIKE '%{$searchable}%')
             UNION 
             SELECT pr.id, pr.title, pr.slug, pc.slug AS category, 'product' AS type 
             FROM products as pr
             LEFT JOIN product_translations AS prt ON pr.id = prt.product_id
             INNER JOIN product_category AS pc ON pc.id = pr.category_id
             WHERE (pr.status = 1) AND (pr.title LIKE '%{$searchable}%') OR 
                   (prt.locale = ? AND (prt.description LIKE '%{$searchable}%' OR 
                   prt.use_cases_description LIKE '%{$searchable}%'))
             LIMIT {$limit} OFFSET {$offset}
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $locale);
        $stmt->bindValue(2, $locale);
        $stmt->execute();

        return [
            'resultCount' => $resultCount,
            'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC),
        ];
    }
}