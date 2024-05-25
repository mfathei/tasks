<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        clearUsersCache();
    }

    public function updated(User $user): void
    {
        clearUsersCache();
    }

    public function deleted(User $user): void
    {
        clearUsersCache();
    }

    public function restored(User $user): void
    {
        clearUsersCache();
    }

    public function forceDeleted(User $user): void
    {
        clearUsersCache();
    }
}
