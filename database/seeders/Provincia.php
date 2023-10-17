<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Provincia extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('provincias')->insert([
            ['nombre'=>'Lima','departamento_id'=>'5'],
            ['nombre'=>'Cañete','departamento_id'=>'5'],
            ['nombre'=>'Arequipa','departamento_id'=>'6'],
            ['nombre'=>'Mollendo','departamento_id'=>'6'],
    
        ]);

    }
}
