<?php

use Illuminate\Database\Seeder;

class CommoditiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('commodities')->insert([
            'name' => 'Coconut Water- Tetra Pak',
            'code' => 'CW-TP',
            
        ]);
    	
        DB::table('commodities')->insert([
            'name' => 'Conventional Coconut Water- Aseptic',
            'code' => 'CCW-A',
            
        ]);

        DB::table('commodities')->insert([
            'name' => 'Organic Coconut Water- Aseptic',
            'code' => 'OCW-A',
            
        ]);

    	DB::table('commodities')->insert([
            'name' => 'Frozen Coconut Water Concentrate',
            'code' => 'FCWC',
            
        ]);

        DB::table('commodities')->insert([
            'name' => 'Cleaning In Place',
            'code' => 'CIP',
            
        ]);

         DB::table('commodities')->insert([
            'name' => 'Total Preventive Maintenance',
            'code' => 'TPM',
            
        ]);


        
    
    }
}
