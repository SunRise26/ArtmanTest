<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'status_id' => $this->faker->numberBetween(0, count(UserStatus::getUserStatuses()) - 1),
        ];
    }
}
