<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // El valor de user_id coincide con el user autenticado para no permitir fraude desde inspeccionar
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
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
        $rules = [
            'post_name' => 'required',
            'post_slug' => 'required|unique:posts',
            'post_status' => 'required|in:1,2',
        ];

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
