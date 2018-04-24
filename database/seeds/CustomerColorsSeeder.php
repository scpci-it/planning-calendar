<?php

use Illuminate\Database\Seeder;

class CustomerColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_colors')->insert([
            'customer_id' => '1',
            'color' => 'blue',
            'bg_color' => 'blue',
            'text_color' => 'white',
            'border_color' => 'white',
           
        ]);
    }
}
