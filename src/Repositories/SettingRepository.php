<?php

namespace App\Repositories;

use App\Core\Config;

/**
 * Class SettingRepository
 * Repository for managing application settings key-value store
 */
class SettingRepository extends AbstractRepository
{
    protected string $table = 'settings';
    protected string $primaryKey = 'key_name';

    /**
     * Get a specific setting value
     *
     * @param string $key
     * @param string $default
     * @return string
     */
    public function get(string $key, string $default = ''): string
    {
        try {
            $stmt = $this->getDb()->prepare("SELECT key_value FROM {$this->table} WHERE key_name = ? LIMIT 1");
            $stmt->execute([$key]);
            $row = $stmt->fetch();
            return $row ? (string)$row['key_value'] : $default;
        } catch (\Exception $e) {
            error_log("SettingRepository::get Error: " . $e->getMessage());
            return $default;
        }
    }

    /**
     * Get all settings as an associative key-value map
     *
     * @return array
     */
    public function getAllAsMap(): array
    {
        try {
            $stmt = $this->getDb()->query("SELECT key_name, key_value FROM {$this->table}");
            $rows = $stmt->fetchAll() ?: [];
            $map = [];
            foreach ($rows as $r) {
                $map[$r['key_name']] = $r['key_value'];
            }
            return $map;
        } catch (\Exception $e) {
            error_log("SettingRepository::getAllAsMap Error: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Set / Update a specific setting key-value pair
     *
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function set(string $key, string $value): bool
    {
        try {
            $driver = Config::get('db_driver', 'sqlite');
            $sql = ($driver === 'mysql') 
                ? "INSERT INTO {$this->table} (key_name, key_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE key_value = VALUES(key_value)"
                : "INSERT OR REPLACE INTO {$this->table} (key_name, key_value) VALUES (?, ?)";

            $stmt = $this->getDb()->prepare($sql);
            return $stmt->execute([$key, $value]);
        } catch (\Exception $e) {
            error_log("SettingRepository::set Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Batch update multiple settings at once
     *
     * @param array $settings Map of key => value
     * @return bool
     */
    public function setMany(array $settings): bool
    {
        $success = true;
        foreach ($settings as $k => $v) {
            if (!$this->set((string)$k, (string)$v)) {
                $success = false;
            }
        }
        return $success;
    }
}
