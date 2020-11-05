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
        $last_initial = substr($last_name[0], 0, 1);
        $netID = strtolower($first_initial) . strtolower($last_initial) . rand(1, 400);

        $msuid_append = range(0, 6);
        shuffle($msuid_append);
        $msuid = "90" . implode("", $msuid_append);

        $majors = array("CS", "SE");

        return [
            'msuid' => $msuid,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $netID."@msstate.edu",
            'email_verified_at' => now(),
            'major' => $majors[rand(0,1)],
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
