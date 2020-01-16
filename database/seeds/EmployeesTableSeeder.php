<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 10 ; $i++) { 
            DB::table('employees')->insert([
                'nama'          => 'Nur Awwabin Yoga Saputra'.' '.$i,
                'email'         => $i.'-'.'yoga@gmail.com' ,
                'company_id'    => rand(1,10),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]);
            
        }
    }
}
