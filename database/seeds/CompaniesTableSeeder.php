<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=5 ; $i++) { 
            DB::table('companies')->insert([
                'nama'      => 'PT Transisi Teknologi Mandiri'.' '.$i,
                'email'     => $i.'_'.'admin@transisi.com',
                'logo'      => '1579115188-3.png',
                'website'   => $i.'_'.'transisi.com',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]);
        }
        for ($i=1; $i <=5 ; $i++) { 
            DB::table('companies')->insert([
                'nama'      => 'PT Transisi Teknologi Mandiri'.' '.$i,
                'email'     => $i.'_'.'admin@gmail.com',
                'logo'      => '2.png',
                'website'   => $i.'_'.'transisi.com',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]);
        }
        for ($i=1; $i <=5 ; $i++) { 
            DB::table('companies')->insert([
                'nama'      => 'PT Transisi Teknologi Mandiri'.' '.$i,
                'email'     => $i.'_'.'admin_transisi@transisi.com',
                'logo'      => '1579141047-transisi.png',
                'website'   => $i.'_'.'transisi.com',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]);
        }
        
    }
}
