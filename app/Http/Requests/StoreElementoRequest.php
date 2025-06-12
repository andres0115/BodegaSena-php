<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElementoRequest extends FormRequest
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
            'nombre'    =>  [
                'required',
                'string',
                'max:50',
                'unique:elementos,nombre',
                'alpha_space'
            ],

            'descripcion' => [
                'required',
                'string',
                'max:1000',
                'min:5'
            ],

            'stock'     =>  [
                'required',
                'integer',
                'min:0'
            ]
        ];
    }

    public function messages()
    {

        return [

            'nombre.required'            =>    'El nombre es obligatorio',
            'nombre.string'              =>    'El nombre debe ser una cadena de texto',
            'nombre.max'                 =>    'El nombre no puede exceder los 1000 caracteres',
            'nombre.unique'              =>    'El nombre ya existe en la base de datos',

            'descripcion.required'       =>    'La descripcion es obligatoria',
            'descripcion.text'           =>    'La descripcion debe ser una cadena de texto',
            'descripcion.max'            =>    'La descripcion no puede exceder los 50 caracteres',
            'nombre.min'                 =>    'El nombre no puede tener menos de 5 caracteres',

            'stock.required'             =>    'La stock es obligatorio',
            'stock.integer'              =>    'La stock debe ser una entero',
            'stock.min'                  =>     'El stock no debe ser un numero negativo',


        ];
    }
}
