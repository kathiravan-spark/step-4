<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\UserNomineesModel;

class UserNomineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = UserModel::where('name','kari')->pluck('id');
        $userId =$userId[0];
        
        UserNomineesModel::firstOrCreate(
            [ 
                'email' => "hari@mailinator.com",
            ],
            [   
                'user_id'=> $userId,
                'name' => 'hariharan',
                'address' => "UK",
                'state' => 'Birmingham',
                'postal_code' => 'B6 9EN ',
                'nominee-type' => 5,
                'created_at' =>now(),
                'updated_at' =>now(),
            ]
        );
    }
}
