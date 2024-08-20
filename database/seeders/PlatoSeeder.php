<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platos')->insert([
            "nombre"=>"1/8 de Pollo",
            "descripcion"=>"1/8 de Pollo + Papas + Ensalada+ Cremas",
            "precio"=>7.5,
            "tipo_plato_id"=>1
        ]);
        DB::table('platos')->insert([
            "nombre"=>"1/4 de Pollo",
            "descripcion"=>"1/4 de Pollo + Papas + Ensalada+ Cremas",
            "precio"=>13,
            "tipo_plato_id"=>1
        ]);
        DB::table('platos')->insert([
            "nombre"=>"1/2 de Pollo",
            "descripcion"=>"1/2 de Pollo + Papas + Ensalada+ Cremas",
            "precio"=>25,
            "tipo_plato_id"=>1
        ]);
        DB::table('platos')->insert([
            "nombre"=>"1 Pollo",
            "descripcion"=>"1 Pollo + Papas + Ensalada+ Cremas",
            "precio"=>50,
            "tipo_plato_id"=>1
        ]);
        DB::table('platos')->insert([
            "nombre"=>"Arroz Chaufa",
            "descripcion"=>"Plato personal de Arroz Chaufa",
            "precio"=>10.5,
            "tipo_plato_id"=>2
        ]);
        DB::table('platos')->insert([
            "nombre"=>"Lomo Saltado",
            "descripcion"=>"Plato personal de Lomo Saltado",
            "precio"=>10,
            "tipo_plato_id"=>2
        ]);
        DB::table('platos')->insert([
            "nombre"=>"Churrasco",
            "descripcion"=>"Plato personal de Churrasco",
            "precio"=>10,
            "tipo_plato_id"=>2
        ]);
        DB::table('platos')->insert([
            "nombre"=>"Ceviche",
            "descripcion"=>"Plato personal de Ceviche",
            "precio"=>21,
            "tipo_plato_id"=>2
        ]);
        DB::table('platos')->insert([
            "nombre"=>"1L de Chicha Morada",
            "descripcion"=>"1L de Chicha Morada",
            "precio"=>5.5,
            "tipo_plato_id"=>4
        ]);
        DB::table('platos')->insert([
            "nombre"=>"1L de Maracuya",
            "descripcion"=>"1L de Jugo de Maracuya",
            "precio"=>5,
            "tipo_plato_id"=>4
        ]);
        DB::table('platos')->insert([
            "nombre"=>"Inka Kola 1L",
            "descripcion"=>"Gaseosa Inka Kola de Litro",
            "precio"=>6,
            "tipo_plato_id"=>4
        ]);
        DB::table('platos')->insert([
            "nombre"=>"Coca Cola 1L",
            "descripcion"=>"Gaseosa Coca Cola de Litro",
            "precio"=>6.5,
            "tipo_plato_id"=>4
        ]);
    }
}
