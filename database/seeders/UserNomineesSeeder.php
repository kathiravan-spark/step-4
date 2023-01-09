<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\UserNomineesModel;

class UserNomineesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $nomineeId = $userId =[];
        $users = UserModel::get();
        
        foreach($users as $user){
          
            $userRole = $user->role;
            if($userRole == 0){
               
                $userId[] = $user->id;
            }else{
                
                $nomineeId[] = $user->id;
            }
            
            UserNomineesModel::firstOrCreate(
                [
                    'user_id'=> $userId,
                ],
                [
                    'nominee_to' =>$nomineeId,
                    'nominee_type' => 5,
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]
            );
        }
    }
}
