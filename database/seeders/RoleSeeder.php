<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([

            [
                'role' => 'admin',
              
            ],
            [
                'role' => 'customer',
               
            ],
            [
                'role' => 'vendor',
               
            ],

            [
                'role' => 'sales department',
              
            ],
            [
                'role' => 'purchase department',
               
            ],
            

        ]);
        
    }

}
