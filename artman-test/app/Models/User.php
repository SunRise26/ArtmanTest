<?php

namespace App\Models;

use App\Events\User\CreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dispatchesEvents = [
        'created' => CreatedEvent::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userStatus()
    {
        return $this->hasOne(UserStatus::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class)
            ->orderByDesc('last_activity'); // latest to top
    }

    /**
     * Update and return real user status id
     * 
     * @return int
     */
    public function updateUserRealStatusId()
    {
        $userStatuses = UserStatus::getUserStatuses();
        $latestActiveSession = $this->sessions->first();
        $newUserStatus = null;

        if (!$latestActiveSession || $latestActiveSession->isExpired()) {
            $newUserStatus = $userStatuses['offline'];
        } else {
            $newUserStatus = $userStatuses['online'];
        }

        if ($this->userStatus->real_status_id != $newUserStatus) {
            $this->userStatus->update(['real_status_id' => $newUserStatus]);
        }
        return $this->userStatus->real_status_id;
    }

    /**
     * Return user status id to display on home page
     * 
     * @return int
     */
    public function getUserPublicStatus()
    {
        if ($this->updateUserRealStatusId() != 0) {
            return $this->userStatus->status_id;
        }
        return 0;
    }
}
