<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\UserModel;

class UserModelFactory extends Factory
{
    protected $model = UserModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->country(),
            'state' => $this->faker->state(),
            'postal_code' =>$this->faker->postcode(),
            'role' => $this->faker->boolean(),
          
        ];
    }

}
