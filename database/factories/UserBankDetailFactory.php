<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserModel;
use App\Models\BankNameModel;
use App\Models\UserBankDetailModel;


class UserBankDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = UserBankDetailModel::class;

    public function definition()
    {
        return [
            'account_type'=>$this->faker->randomFloat(1,2,3),
        ];
    }
}
