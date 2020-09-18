<?php

use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('specialty')->insert( [ 'name' => 'ALERGOLOGIA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'ANGIOLOGIA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'BUCO MAXILO', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CARDIOLOGIA CLÍNICA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CARDIOLOGIA INFANTIL', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA CABEÇA E PESCOÇO', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA CARDÍACA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA DE CABEÇA/PESCOÇO', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA DE TÓRAX', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA GERAL', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA PEDIÁTRICA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA PLÁSTICA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA TORÁCICA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CIRURGIA VASCULAR', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
        \DB::table('specialty')->insert( [ 'name' => 'CLÍNICA MÉDICA', 'created_at' => getDateNow(), 'updated_at' => getDateNow() ] );
    }
}
