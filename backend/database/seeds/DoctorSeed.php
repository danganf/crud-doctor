<?php

use Illuminate\Database\Seeder;

class DoctorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('doctor')->insert( [ 'name' => 'Teste dos santos', 'crm' => '1234 - RJ', 'phone' => '21981692318', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        
        \DB::table('doctor_specialty')->insert( [ 'doctor_id' => 1, 'specialty_id' => 2, 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('doctor_specialty')->insert( [ 'doctor_id' => 1, 'specialty_id' => 3, 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('doctor_specialty')->insert( [ 'doctor_id' => 1, 'specialty_id' => 7, 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('doctor_specialty')->insert( [ 'doctor_id' => 1, 'specialty_id' => 10, 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('doctor_specialty')->insert( [ 'doctor_id' => 1, 'specialty_id' => 12, 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
    }
}
