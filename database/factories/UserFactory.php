<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

         return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password'), 
            'is_admin' => false, 
        ];
    }
    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            $faker = Faker::create();

            return [
                'is_admin' => true,
            ];
        });
    }
}
