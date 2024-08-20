<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_platos')->insert([
            "descripcion"=>"Pollo a la Brasa"
        ]);
        DB::table('tipo_platos')->insert([
            "descripcion"=>"Platos Especiales"
        ]);
        DB::table('tipo_platos')->insert([
            "descripcion"=>"Ensaladas"
        ]);
        DB::table('tipo_platos')->insert([
            "descripcion"=>"Bebidas"
        ]);
    }
}
