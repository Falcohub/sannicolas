<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generar slug 
        $nombre = $this->faker->unique()->sentence();
        
        return [
            'post_name' => $nombre,
            'post_slug' => Str::slug($nombre),
            'post_extract' => $this->faker->text(250),
            'post_body' => $this->faker->text(2000),
            'post_status' => $this->faker->randomElement([1, 2]),
            'user_id' => User::all()->random()->id,
            'cat_id' => Categoria::all()->random()->id
        ];
    }
}
