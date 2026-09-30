<?php

namespace App\Repositories;

/**
 * Class ServiceRepository
 * Repository for managing services
 */
class ServiceRepository extends AbstractRepository
{
    protected string $table = 'services';
    protected string $defaultOrder = 'order_num ASC, id ASC';

    /**
     * Save (Insert or Update) a service record
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        try {
            $id = !empty($data['id']) ? (int)$data['id'] : null;

            if ($id) {
                $sql = "UPDATE {$this->table} SET 
                    title = ?, tag = ?, icon = ?, color_class = ?, 
                    short_desc = ?, desc = ?, image = ?, points = ?, 
                    tech = ?, order_num = ?
                    WHERE id = ?";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['title'] ?? '',
                    $data['tag'] ?? '',
                    $data['icon'] ?? 'fa-solid fa-gears',
                    $data['color_class'] ?? 'text-cyan-400',
                    $data['short_desc'] ?? '',
                    $data['desc'] ?? '',
                    $data['image'] ?? '',
                    is_array($data['points'] ?? null) ? json_encode($data['points'], JSON_UNESCAPED_UNICODE) : ($data['points'] ?? '[]'),
                    is_array($data['tech'] ?? null) ? json_encode($data['tech'], JSON_UNESCAPED_UNICODE) : ($data['tech'] ?? '[]'),
                    (int)($data['order_num'] ?? 0),
                    $id
                ]);
            } else {
                $sql = "INSERT INTO {$this->table} 
                    (title, tag, icon, color_class, short_desc, desc, image, points, tech, order_num)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['title'] ?? '',
                    $data['tag'] ?? '',
                    $data['icon'] ?? 'fa-solid fa-gears',
                    $data['color_class'] ?? 'text-cyan-400',
                    $data['short_desc'] ?? '',
                    $data['desc'] ?? '',
                    $data['image'] ?? '',
                    is_array($data['points'] ?? null) ? json_encode($data['points'], JSON_UNESCAPED_UNICODE) : ($data['points'] ?? '[]'),
                    is_array($data['tech'] ?? null) ? json_encode($data['tech'], JSON_UNESCAPED_UNICODE) : ($data['tech'] ?? '[]'),
                    (int)($data['order_num'] ?? 0)
                ]);
            }
        } catch (\Exception $e) {
            error_log("ServiceRepository::save Error: " . $e->getMessage());
            return false;
        }
    }
}
