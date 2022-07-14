<?php

use Illuminate\Database\Seeder;

class SwitchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('switches')->insert([
            'name'=>'閲覧者'
            
            ]);
    }
}
