<?php
namespace App\Modules\User\Repositories;

use App\Modules\User\Models\UserProfile;

class UserProfileRepository implements UserProfileRepositoryInterface
{
    public function create($data){
        return UserProfile::create($data)->only('user_id');
    }
}