<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Incluir reglas de validacion
        //Estado 1 o borrador requerir estos campos

        // Recuperar la info del post actual para actualizar el post
        $post = $this->route()->parameter('post');

        $rules = [
            'post_name' => 'required',
            'post_slug' => 'required|unique:posts',
            'post_status' => 'required|in:1,2',
            'file' => 'image'
        ];

        // validacion para editar el registro, actualizar si hay algo almacenado en $post
        if ($post) {
            $rules['post_slug'] = 'required|unique:posts,post_slug,' . $post->id;
        }

        //Estado 2 o publicado
        if ($this->post_status == 2) {

            // Se utiluza metodo de PHP array_merge() el cual fuciona dos arrays
            $rules = array_merge($rules, [
                'cat_id' => 'required',
                'etiquetas' => 'required',
                'post_extract' => 'required',
                'post_body' => 'required'
            ]);
        }

        return $rules;
    }
}
