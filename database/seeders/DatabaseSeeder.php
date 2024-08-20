<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // TIPOUSUARIO
        DB::table('tipousuario')->insert([
            [
            'tipo' => 'ADMINISTRADOR',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'MESERO',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'VENDEDOR',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'GERENTE GENERAL',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'CLIENTE',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'CHEF',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'AYUDANTES',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'COCINEROS',
            'activo' => 1,
            'eliminado' => 0,
          ],
        
        ]);
         //TRABAJADORES
         DB::table('trabajadores')->insert([
          [
          'dni' => '70381123',
          'nombre'=>'Kenner Alexander',
          'apellidoPaterno'=>'Rojas',
          'apellidoMaterno'=>'Ahumada',
          'sexo'=>'M',
          'direccion'=>'Los Olivos 318-La Esperanza',
          'telefono'=>'1574141',
          'celular'=>'948773793',
          'email' => 'kenner@example.org',
          'urlImagen'=>'',
          'activo' => 1,
          'eliminado' => 0,
          ],
          [
            'dni' => '89415212',
            'nombre'=>'Evellyn',
            'apellidoPaterno'=>'Guevara',
            'apellidoMaterno'=>'Vega',
            'sexo'=>'F',
            'direccion'=>'Los Olivos 318-La Esperanza',
            'telefono'=>'1574141',
            'celular'=>'941715963',
            'email' => 'evellyn@example.org',
            'urlImagen'=>'',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'dni' => '80241123',
            'nombre'=>'Ayrton Oscar',
            'apellidoPaterno'=>'Soto',
            'apellidoMaterno'=>'Alarcon',
            'sexo'=>'M',
            'direccion'=>'Los Olivos 318-La Esperanza',
            'telefono'=>'5594241',
            'celular'=>'985283293',
            'email' => 'ayrton@example.org',
            'urlImagen'=>'',
            'activo' => 1,
            'eliminado' => 0,
            ],
            [
              'dni' => '89415212',
              'nombre'=>'Jose',
              'apellidoPaterno'=>'Delgado',
              'apellidoMaterno'=>'Deza',
              'sexo'=>'M',
              'direccion'=>'Los Olivos 318-La Esperanza',
              'telefono'=>'8794211',
              'celular'=>'952634063',
              'email' => 'jose@example.org',
              'urlImagen'=>'',
              'activo' => 1,
              'eliminado' => 0,
            ],
      ]);

        //USERS
        DB::table('users')->insert([
            [
            'username' => 'admin',
            'email' => 'kenner@example.org',
            'email_verified_at' =>'2021-08-14 19:15:38',
            'password' => Hash::make('123456'),
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            'created_at' => '2021-08-14 19:15:38',
            'updated_at' => '2021-08-14 19:15:38',
            'idtipousuario' => '1',
            'idtrabajador'=>1,
            'activo' => 1,
            'eliminado' => 0,
            ],
            [
            'username' => 'evellyn',
            'email' => 'evellyn@example.org',
            'email_verified_at' =>'2021-08-14 19:15:38',
            'password' => Hash::make('123456'),
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            'created_at' => '2021-08-14 19:15:38',
            'updated_at' => '2021-08-14 19:15:38',
            'idtipousuario' => '2',
            'idtrabajador'=>2,
            'activo' => 1,
            'eliminado' => 0,
            ],
            [
              'username' => 'ayrton',
              'email' => 'ayrton@example.org',
              'email_verified_at' =>'2021-08-14 19:15:38',
              'password' => Hash::make('123456'),
              'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
              'created_at' => '2021-08-14 19:15:38',
              'updated_at' => '2021-08-14 19:15:38',
              'idtipousuario' => '3',
              'idtrabajador'=>3,
              'activo' => 1,
              'eliminado' => 0,
              ],
              [
              'username' => 'jose',
              'email' => 'jose@example.org',
              'email_verified_at' =>'2021-08-14 19:15:38',
              'password' => Hash::make('123456'),
              'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
              'created_at' => '2021-08-14 19:15:38',
              'updated_at' => '2021-08-14 19:15:38',
              'idtipousuario' => '4',
              'idtrabajador'=>4,
              'activo' => 1,
              'eliminado' => 0,
              ],
        ]);

        Vendedor::factory(5)->create()->each(function ($empleado){
            $arrNombres = (explode(' ',$empleado->nombres));
            $arrApellidos = (explode(' ', $empleado->apellidos));
            $username = $arrNombres[0].sizeof($arrNombres).substr($arrNombres[1],0,1).$arrApellidos[0];
            $email = $arrNombres[0]."_".$empleado->dni;
            // User::factory()->create([
            //     'username' => $username,
            //     'email' => $email."@gmail.com",
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('123456'), // 123456
            //     'remember_token' => Str::random(10),
            // ]);
        });
        $this->call(TipoPlatoSeeder::class);
        $this->call(PlatoSeeder::class);
        // \App\Models\User::factory(10)->create();

        
    }
}
