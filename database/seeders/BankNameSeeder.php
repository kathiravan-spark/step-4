<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Models\BankNameModel;


class BankNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankNameModel::insert([
            [                
                'id' => Uuid::uuid4(),
                'name' => 'HDFC Bank',
                'branch'=>'COIMBATORE',
                'ifsc_code' =>'HDFC0000031 ',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'Canara Bank',
                'branch' => 'COIMBATORE',
                'ifsc_code' => 'CNRB0002396',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'Indian Bank',
                'branch' => 'COIMBATORE',
                'ifsc_code' => 'IDIB000C031',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'Indian Overseas Bank',
                'branch' => 'COIMBATORE',
                'ifsc_code' => 'IOBA0002670',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'State Bank of India',
                'branch' =>'COIMBATORE' ,
                'ifsc-code' =>'SBIN0000827',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'Axis Bank',
                'branch' => 'COIMBATORE',
                'ifsc_code' => 'UTIB0001412',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'City Union Bank',
                'branch' => 'COIMBATORE',
                'ifsc_code' => 'CIUB0000034',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'Karur Vysya Bank',
                'branch' => 'COIMBATORE',
                'ifsc-code' => 'KVBL0001120',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [ 
                'id' => Uuid::uuid4(),
                'name' => 'ICICI Bank',
                'branch' => 'COIMBATORE',
                'ifsc_code' => 'ICIC0006605',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
        ]);
    }
}
