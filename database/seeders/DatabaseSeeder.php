<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Etiqueta;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Eliminar la carpeta post
        Storage::deleteDirectory('public/posts');
        //Crear carpeta en la carpeta Storage
        Storage::makeDirectory('public/posts');

        $this->call(UserSeeder::class);
        Categoria::factory(4)->create();
        Etiqueta::factory(8)->create();
        //Descargar las imagenes de la carpeta post
        $this->call(PostSeeder::class);
    }
}
