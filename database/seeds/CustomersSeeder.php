<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('customers')->insert([
            'name' => 'H2 Coco',
            'code' => 'CW-H2',
            'color' => 'blue',
            'text_color' => 'white',
            'border_color' => 'black',
           
        ]);


          DB::table('customers')->insert([
            'name' => 'Real Coco',
            'code' => 'CW-RC',
            'color' => 'green',
            'text_color' => 'white',
            'border_color' => 'black',
            
       	]);


          DB::table('customers')->insert([
            'name' => 'Zico',
            'code' => 'CW-Zico',
            'color' => 'orange',
            'text_color' => 'black',
            'border_color' => 'black',
            
        ]);

          DB::table('customers')->insert([
            'name' => 'Catz',
            'code' => 'CW-CTZ',
            'color' => 'yelow',
            'text_color' => 'black',
            'border_color' => 'black',
            
        ]);


          DB::table('customers')->insert([
            'name' => 'Jax',
            'code' => 'CW-JAX',
            'color' => 'gray',
            'text_color' => 'black',
            'border_color' => 'black',
            

        ]);

           DB::table('customers')->insert([
            'name' => 'Plant Activity',
            'code' => 'CW-CIP/TPM',
            'color' => 'red',
            'text_color' => 'black',
            'border_color' => 'black',
            
        ]);


    }
}
