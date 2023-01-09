<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::firstOrCreate(
            [
                'email' => "kari@mailinator.com",
            ],
            [
                'name' => 'kari',
                'address' => "UK",
                'state' => 'London',
                'postal_code' => '47626',
                'role' => 1,
                'created_at' =>now(),
                'updated_at' =>now(),
            ]
        );
        UserModel::factory()->count(10)->create();
    }
}
