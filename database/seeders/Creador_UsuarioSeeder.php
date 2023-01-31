<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Creador_UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=> 'Antonio',
        'email'=>'antonio@gmail.com',
        'password'=>'zg9rXjz4lcRxqwNlDj8eqM6ajieOA6kpexBKg4CZ6iafsp0jCh5dGa3WaSDEiUvqnAb98m',
        ]);
        DB::table('users')->insert([
            'name'=> 'Pedro',
        'email'=>'pedro@gmail.com',
        'password'=>'zg9rXjz4lcRxqwNlDj8eqM6ajieOA6kpexBKg4CZ6iafsp0jCh5dGa3WaSDEiUvqnAb98m',
        ]);

    }
}
