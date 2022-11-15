<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserNomineesModel;
use App\Models\UserModel;

class UserNomineesModelFactory extends Factory
{
    protected $model = UserNomineesModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = UserModel::pluck('id');
        foreach($userId as $user) {
        $data[] =  [
                'user_id'=>$user,
                'email' => $this->faker->unique()->safeEmail(),
                'name' => $this->faker->name(),
                'address' => $this->faker->country(),
                'state' => $this->faker->state(),
                'postal_code' =>$this->faker->postcode(),
                'nominee_type' => $this->faker->numberBetween(1,2,3,4,5),
            ];
        }
        
        return ksort($data);
    }
}
