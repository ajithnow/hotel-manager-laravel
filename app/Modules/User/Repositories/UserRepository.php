<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create a new User.
     *
     * @param User $user The User instance to create.
     * @return User The created User instance.
     */
    public function create(array $user): User
    {
        return User::create($user);
    }

    /**
     * Update a User.
     *
     * @param User $user The User instance to update.
     * @return User The updated User instance.
     */
    public function update(User $user): User
    {
        return User::where('uuid', $user->uuid)->update($user->toArray());
    }

    /**
     * Delete a User.
     *
     * @param string $uuid The uuid of the user to delete.
     * @return bool True if the user is successfully deleted, false otherwise.
     */
    public function delete(string $uuid): bool
    {
        return User::destroy($uuid);
    }

    public function get(string $uuid): User
    {
        return User::find($uuid);
    }

    /**
     * Find a user by ID.
     *
     * @param string $uuid The UUID of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findById(string $uuid): User
    {
        return User::find($uuid);
    }

    /**
     * Get all users.
     *
     * @return array An array of User instances.
     */
    public function findAll(): array
    {
        return User::all()->toArray();
    }

    /**
     * Find a user by email.
     *
     * @param string $email The email of the user to find.
     * @return User|null The found User instance, or null if not found.
     */
    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }

    public function findByUUID(string $uuid): User
    {
        return User::findOrFail($uuid);
    }
}
