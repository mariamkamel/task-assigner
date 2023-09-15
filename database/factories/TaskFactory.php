<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
            'assigned_to_id' => function () {
                return factory(App\Models\User::class)->create()->id;
            },
            'assigned_by_id' => function () {
                return factory(App\Models\User::class)->create()->id;
            },
        ];
    
    }

    
}
