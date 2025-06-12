<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar este request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para el request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'name'                  => [
                'required',
                'string',
                'max:255',
                'alpha_space',
            ],
            'role'                  => [
                'required',
                'string',
                'in:admin,user',
            ],
            'email'                 => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password'              => [
                'required',
                'string',
                'min:6',
            ],
            'password_confirmation' => [
                'required',
                'same:password',
            ],
        ];
    }

    /**
     * Mensajes de error personalizados.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'                   => 'El nombre es obligatorio.',
            'name.string'                     => 'El nombre debe ser un texto válido.',
            'name.max'                        => 'El nombre no puede exceder los 255 caracteres.',
            'name.alpha_space'                => 'El nombre solo puede contener letras y espacios.',

            'role.required'                   => 'El rol es obligatorio.',
            'role.in'                         => 'El rol debe ser "admin" o "user".',

            'email.required'                  => 'El email es obligatorio.',
            'email.email'                     => 'El email debe tener un formato válido.',
            'email.max'                       => 'El email no puede exceder los 255 caracteres.',
            'email.unique'                    => 'El correo ya existe en la base de datos.',

            'password.required'               => 'La contraseña es obligatoria.',
            'password.min'                    => 'La contraseña debe tener mínimo 6 caracteres.',

            'password_confirmation.required'  => 'Es necesario confirmar la contraseña.',
            'password_confirmation.same'      => 'Las contraseñas no coinciden.',
        ];
    }
}

