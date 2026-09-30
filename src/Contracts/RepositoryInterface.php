<?php

namespace App\Contracts;

/**
 * Interface RepositoryInterface
 * Contract for all entity repositories following SOLID (Interface Segregation & Dependency Inversion)
 */
interface RepositoryInterface
{
    /**
     * Get all records
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Find record by ID
     *
     * @param mixed $id
     * @return array|null
     */
    public function findById($id): ?array;

    /**
     * Delete record by ID
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id): bool;

    /**
     * Get total count of records
     *
     * @return int
     */
    public function count(): int;
}
