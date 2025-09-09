<?php

namespace App\Policies;

use App\Models\Config;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfigPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Config $config): bool
    {
        return true;
    }

    public function viewAny(User $user, Config $config): bool
    {
        return true;
    }
}
