<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(Usuario::all());
    }

    public function store(UsuarioRequest $request)
    {
        try {
            $datos = $request->validated();
            $datos['password'] = Hash::make($datos['password']);
            
            $usuario = Usuario::create($datos);
            
            return response()->json([
                'message' => 'Usuario creado exitosamente',
                'usuario' => $usuario
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->validated());
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
} 