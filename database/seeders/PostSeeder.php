<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imagen;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(1)->create();

        foreach ($posts as $post) {
            Imagen::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);
            //metodo attach agregar id de las etiquetas
            $post->etiquetas()->attach([
                //Seleccionar etiquetas al azar
                rand(1, 4),
                rand(5, 8)
            ]);
        }
    }
}
