<?php
namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;

interface UserRepositoryInterface
{
    /**
     * Create a new User.
     *
     * @param User $user The User instance to create.
     * @return User The created User instance.
     */
    public function create(array $user): User;

    /**
     * Update a User.
     *
     * @param User $user The User instance to update.
     * @return User The updated User instance.
     */
    public function update(User $user): User;

    /**
     * Delete a User.
     *
     * @param User $user The User instance to delete.
     * @return bool True if the user is successfully deleted, false otherwise.
     */
    public function delete(User $user): bool;

    /**
     * Find a user by ID.
     *
     * @param int $id The ID of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findById(int $id): User;

    /**
     * Find a user by UUID.
     *
     * @param int $id The ID of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findByUUID(string $uuid): User;

    /**
     * Get all users.
     *
     * @return array An array of User instances.
     */
    public function findAll(): array;
    
    /**
     * Find a user by email.
     *
     * @param string $email The email of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findByEmail(string $email): User;
}
