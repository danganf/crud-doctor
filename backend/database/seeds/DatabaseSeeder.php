<?php

use Illuminate\Database\Seeder;
use Symfony\Component\CssSelector\Node\Specificity;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(User::class);
        $this->call(SpecialtySeeder::class);
        $this->call(DoctorSeed::class);
    }
}
