<?php

namespace App\Repositories;

/**
 * Class GalleryRepository
 * Repository for managing screenshot gallery items
 */
class GalleryRepository extends AbstractRepository
{
    protected string $table = 'gallery';
    protected string $defaultOrder = 'order_num ASC, id ASC';

    /**
     * Get gallery items by category
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
            error_log("GalleryRepository::getByCategory Error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Save (Insert or Update) a gallery item
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
                    gallery_slug = ?, title = ?, category = ?, category_name = ?, 
                    image = ?, desc = ?, tech = ?, icon = ?, order_num = ?
                    WHERE id = ?";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['gallery_slug'] ?? '',
                    $data['title'] ?? '',
                    $data['category'] ?? 'erp',
                    $data['category_name'] ?? '',
                    $data['image'] ?? '',
                    $data['desc'] ?? '',
                    $data['tech'] ?? '',
                    $data['icon'] ?? 'fa-solid fa-images',
                    (int)($data['order_num'] ?? 0),
                    $id
                ]);
            } else {
                $sql = "INSERT INTO {$this->table} 
                    (gallery_slug, title, category, category_name, image, desc, tech, icon, order_num)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['gallery_slug'] ?? '',
                    $data['title'] ?? '',
                    $data['category'] ?? 'erp',
                    $data['category_name'] ?? '',
                    $data['image'] ?? '',
                    $data['desc'] ?? '',
                    $data['tech'] ?? '',
                    $data['icon'] ?? 'fa-solid fa-images',
                    (int)($data['order_num'] ?? 0)
                ]);
            }
        } catch (\Exception $e) {
            error_log("GalleryRepository::save Error: " . $e->getMessage());
            return false;
        }
    }
}
