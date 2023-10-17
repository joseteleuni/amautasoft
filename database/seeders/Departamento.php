<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Departamento extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('departamentos')->insert([
            ['nombre'=>'Lima'],
            ['nombre'=>'Arequipa'],
            ['nombre'=>'Puno'],
            ['nombre'=>'Puerto Maldonado'],
        ]);
    }
}
