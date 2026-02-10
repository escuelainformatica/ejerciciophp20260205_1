<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                    'Titulo'=>'required|max:40',
                    'Autor'=>'required|max:50',
                    'NumPaginas'=>'integer|between:0,1000', // ese campo es entero y por lo tanto, otras comparaciones son considerando que es un numero y no un texto
                    'Precio'=>'integer|gte:0'
                ];
    }
}
