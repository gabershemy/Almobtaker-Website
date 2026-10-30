<?php

namespace App\Repositories;

/**
 * Class ProjectRepository
 * Repository for managing portfolio projects
 */
class ProjectRepository extends AbstractRepository
{
    protected string $table = 'projects';
    protected string $defaultOrder = 'order_num ASC, id ASC';

    /**
     * Get projects by category
     *
     * @param string $category
     * @return array
     */
    public function getByCategory(string $category): array
    {
        try {
            $stmt = $this->getDb()->prepare("SELECT * FROM {$this->table} WHERE category = ? ORDER BY {$this->defaultOrder}");
            $stmt->execute([$category]);
            return $stmt->fetchAll() ?: [];
        } catch (\Exception $e) {
            error_log("ProjectRepository::getByCategory Error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Save (Insert or Update) a project record
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
                    project_slug = ?, title = ?, category = ?, category_name = ?, 
                    tech = ?, description = ?, status = ?, image = ?, 
                    hero_image = ?, screenshots = ?, full_desc = ?, 
                    features = ?, metrics = ?, order_num = ?,
                    seo_title = ?, seo_desc = ?, seo_keywords = ?
                    WHERE id = ?";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['project_slug'] ?? '',
                    $data['title'] ?? '',
                    $data['category'] ?? 'erp',
                    $data['category_name'] ?? '',
                    $data['tech'] ?? '',
                    $data['description'] ?? '',
                    $data['status'] ?? '',
                    $data['image'] ?? '',
                    $data['hero_image'] ?? ($data['image'] ?? ''),
                    is_array($data['screenshots'] ?? null) ? json_encode($data['screenshots'], JSON_UNESCAPED_UNICODE) : ($data['screenshots'] ?? '[]'),
                    $data['full_desc'] ?? ($data['description'] ?? ''),
                    is_array($data['features'] ?? null) ? json_encode($data['features'], JSON_UNESCAPED_UNICODE) : ($data['features'] ?? '[]'),
                    is_array($data['metrics'] ?? null) ? json_encode($data['metrics'], JSON_UNESCAPED_UNICODE) : ($data['metrics'] ?? '[]'),
                    (int)($data['order_num'] ?? 0),
                    $data['seo_title'] ?? null,
                    $data['seo_desc'] ?? null,
                    $data['seo_keywords'] ?? null,
                    $id
                ]);
            } else {
                $sql = "INSERT INTO {$this->table} 
                    (project_slug, title, category, category_name, tech, description, status, image, hero_image, screenshots, full_desc, features, metrics, order_num, seo_title, seo_desc, seo_keywords)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['project_slug'] ?? '',
                    $data['title'] ?? '',
                    $data['category'] ?? 'erp',
                    $data['category_name'] ?? '',
                    $data['tech'] ?? '',
                    $data['description'] ?? '',
                    $data['status'] ?? '',
                    $data['image'] ?? '',
                    $data['hero_image'] ?? ($data['image'] ?? ''),
                    is_array($data['screenshots'] ?? null) ? json_encode($data['screenshots'], JSON_UNESCAPED_UNICODE) : ($data['screenshots'] ?? '[]'),
                    $data['full_desc'] ?? ($data['description'] ?? ''),
                    is_array($data['features'] ?? null) ? json_encode($data['features'], JSON_UNESCAPED_UNICODE) : ($data['features'] ?? '[]'),
                    is_array($data['metrics'] ?? null) ? json_encode($data['metrics'], JSON_UNESCAPED_UNICODE) : ($data['metrics'] ?? '[]'),
                    (int)($data['order_num'] ?? 0),
                    $data['seo_title'] ?? null,
                    $data['seo_desc'] ?? null,
                    $data['seo_keywords'] ?? null
                ]);
            }
        } catch (\Exception $e) {
            error_log("ProjectRepository::save Error: " . $e->getMessage());
            return false;
        }
    }
}
