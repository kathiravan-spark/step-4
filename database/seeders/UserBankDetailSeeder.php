<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use App\Models\BankNameModel;
use App\Models\UserBankDetailModel;
use App\Models\UserNomineesModel;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class UserBankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = UserModel::with('getNominee')->get();
        $bankId = BankNameModel::where('name','HDFC bank')->pluck('id');
        $bankId = $bankId[0];
            foreach($users as $user){
                $userId = $user->id;
                UserBankDetailModel::firstorCreate(
                    [
                        'user_id'=> $userId,
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'bank_id' => $bankId,
                        'account_number'=>Str::random(13), 
                        'account_name'=> $user->name,    
                        'account_type' => 1,
                        'created_at' =>now(),
                        'updated_at' =>now(),
                    ]
                );

            }
    }
}
