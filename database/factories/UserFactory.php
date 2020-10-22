<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;

        $first_initial = substr($first_name[0], 0, 1);
        $last_initial = substr($last_name[1], 0, 1);
        $netID = strtolower($first_initial) . strtolower($last_initial) . rand(1, 400);

        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $netID."@msstate.edu",
            'email_verified_at' => now(),
            'major' => "CS",
            'password' => $this->faker->lexify("??????????"), // password
            'remember_token' => Str::random(10),
        ];
    }
}
