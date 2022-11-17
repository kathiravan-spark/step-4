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
        dd(4646);
        $userIds = UserModel::pluck('id');
        
        foreach($userIds as $userId) {
           
        $data[] =  [
                'user_id'=>$userId,
                'nominee_to' =>$userId,
                'nominee_type' => $this->faker->numberBetween(1,2,3,4,5),
            ];
        }
        dd($data);
        return ksort($data);
    }
}
