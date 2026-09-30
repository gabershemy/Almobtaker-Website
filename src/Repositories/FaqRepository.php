<?php

namespace App\Repositories;

/**
 * Class FaqRepository
 * Repository for managing FAQ questions and answers
 */
class FaqRepository extends AbstractRepository
{
    protected string $table = 'faqs';
    protected string $defaultOrder = 'order_num ASC, id ASC';

    /**
     * Get FAQs by category
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
            error_log("FaqRepository::getByCategory Error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Save (Insert or Update) a FAQ item
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        try {
            $id = !empty($data['id']) ? (int)$data['id'] : null;

            if ($id) {
                $sql = "UPDATE {$this->table} SET category = ?, question = ?, answer = ?, order_num = ? WHERE id = ?";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['category'] ?? 'general',
                    $data['question'] ?? '',
                    $data['answer'] ?? '',
                    (int)($data['order_num'] ?? 0),
                    $id
                ]);
            } else {
                $sql = "INSERT INTO {$this->table} (category, question, answer, order_num) VALUES (?, ?, ?, ?)";
                $stmt = $this->getDb()->prepare($sql);
                return $stmt->execute([
                    $data['category'] ?? 'general',
                    $data['question'] ?? '',
                    $data['answer'] ?? '',
                    (int)($data['order_num'] ?? 0)
                ]);
            }
        } catch (\Exception $e) {
            error_log("FaqRepository::save Error: " . $e->getMessage());
            return false;
        }
    }
}
