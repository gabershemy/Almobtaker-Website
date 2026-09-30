<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Core\Database;
use PDO;

/**
 * Class AbstractRepository
 * Base Repository implementation following DRY & SOLID principles
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var string Database table name
     */
    protected string $table;

    /**
     * @var string Primary key column name
     */
    protected string $primaryKey = 'id';

    /**
     * @var string Default order by clause
     */
    protected string $defaultOrder = 'id ASC';

    /**
     * Get active PDO database connection
     *
     * @return PDO
     */
    protected function getDb(): PDO
    {
        return Database::getConnection();
    }

    /**
     * Get all records from table
     *
     * @return array
     */
    public function getAll(): array
    {
        try {
            $stmt = $this->getDb()->query("SELECT * FROM {$this->table} ORDER BY {$this->defaultOrder}");
            return $stmt->fetchAll() ?: [];
        } catch (\Exception $e) {
            error_log("Repository Error in {$this->table}::getAll - " . $e->getMessage());
            return [];
        }
    }

    /**
     * Find single record by primary key
     *
     * @param mixed $id
     * @return array|null
     */
    public function findById($id): ?array
    {
        try {
            $stmt = $this->getDb()->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ? LIMIT 1");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            return $result ?: null;
        } catch (\Exception $e) {
            error_log("Repository Error in {$this->table}::findById - " . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete record by primary key
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            $stmt = $this->getDb()->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?");
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            error_log("Repository Error in {$this->table}::delete - " . $e->getMessage());
            return false;
        }
    }

    /**
     * Count total records in table
     *
     * @param string $where
     * @param array $params
     * @return int
     */
    public function count(string $where = '', array $params = []): int
    {
        try {
            $sql = "SELECT COUNT(*) as cnt FROM {$this->table}";
            if (!empty($where)) {
                $sql .= " WHERE {$where}";
            }
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute($params);
            return (int)($stmt->fetch()['cnt'] ?? 0);
        } catch (\Exception $e) {
            error_log("Repository Error in {$this->table}::count - " . $e->getMessage());
            return 0;
        }
    }
}
