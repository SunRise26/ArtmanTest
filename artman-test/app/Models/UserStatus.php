<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status_id',
    ];

    protected static array $user_statuses = [
        'offline' => 0,
        'online' => 1,
    ];

    public static function getUserStatuses()
    {
        return self::$user_statuses;
    }

    public static function getCodeById($statusId)
    {
        return array_search($statusId, self::$user_statuses);
    }

    public static function getTitleByCode($code)
    {
        return trans("user_status.$code");
    }

    public static function getTitleById($statusId)
    {
        return self::getTitleByCode(self::getCodeById($statusId));
    }

    public function getTitle()
    {
        return self::getTitleById($this->status_id);
    }
}
