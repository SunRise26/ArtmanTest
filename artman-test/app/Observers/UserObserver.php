<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserStatus;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $userStatuses = UserStatus::getUserStatuses();

        UserStatus::create([
            'user_id' => $user->id,
            'status_id' => $userStatuses['online']
        ]);
    }
}
