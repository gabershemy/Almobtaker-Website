<?php

namespace App\Repositories;

/**
 * Class MessageRepository
 * Repository for managing customer inquiries / messages
 */
class MessageRepository extends AbstractRepository
{
    protected string $table = 'inquiries';
    protected string $defaultOrder = 'created_at DESC, id DESC';

    /**
     * Mark a message as read or unread
     *
     * @param int $id
     * @param int $isRead (1 for read, 0 for unread)
     * @return bool
     */
    public function markAsRead(int $id, int $isRead = 1): bool
    {
        try {
            $stmt = $this->getDb()->prepare("UPDATE {$this->table} SET is_read = ? WHERE id = ?");
            return $stmt->execute([$isRead, $id]);
        } catch (\Exception $e) {
            error_log("MessageRepository::markAsRead Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Count unread messages
     *
     * @return int
     */
    public function countUnread(): int
    {
        return $this->count("is_read = 0");
    }

    /**
     * Create a new inquiry record
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        try {
            $sql = "INSERT INTO {$this->table} (name, phone, email, service_type, message, is_read) VALUES (?, ?, ?, ?, ?, 0)";
            $stmt = $this->getDb()->prepare($sql);
            return $stmt->execute([
                $data['name'] ?? '',
                $data['phone'] ?? '',
                $data['email'] ?? '',
                $data['service_type'] ?? 'استفسار عام',
                $data['message'] ?? ''
            ]);
        } catch (\Exception $e) {
            error_log("MessageRepository::create Error: " . $e->getMessage());
            return false;
        }
    }
}
