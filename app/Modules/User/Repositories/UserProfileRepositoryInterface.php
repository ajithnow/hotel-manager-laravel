<?php
namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;
use App\Modules\User\Models\UserProfile;

interface UserProfileRepositoryInterface
{
    public function create($data);
}