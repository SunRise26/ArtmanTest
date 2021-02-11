<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public function isExpired()
    {
        $lastActivity = new Carbon($this->last_activity);
        $diff = Carbon::now()->diffInSeconds($lastActivity);
        if ($diff > (env('SESSION_LIFETIME') * 60)) {
            return true;
        }
        return false;
    }
}
