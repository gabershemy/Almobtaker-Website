<?php

namespace App\Repositories;

/**
 * Class TeamRepository
 * Repository for managing team members
 */
class TeamRepository extends AbstractRepository
{
    protected string $table = 'team';
    protected string $defaultOrder = 'order_num ASC, id ASC';

    /**
     * Save (Insert or Update) a team member
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        try {
            $id = !empty($data['id']) ? (int)$data['id'] : null;

            if ($id) {
                $sql = "UPDATE {$this->table} SET name = ?, role = ?, icon = ?, order_num = ? WHERE id = ?";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['name'] ?? '',
                    $data['role'] ?? '',
                    $data['icon'] ?? 'fa-solid fa-user',
                    (int)($data['order_num'] ?? 0),
                    $id
                ]);
            } else {
                $sql = "INSERT INTO {$this->table} (name, role, icon, order_num) VALUES (?, ?, ?, ?)";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['name'] ?? '',
                    $data['role'] ?? '',
                    $data['icon'] ?? 'fa-solid fa-user',
                    (int)($data['order_num'] ?? 0)
                ]);
            }
        } catch (\Exception $e) {
            error_log("TeamRepository::save Error: " . $e->getMessage());
            return false;
        }
    }
}
