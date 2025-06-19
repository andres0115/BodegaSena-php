<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Http\Requests\RolRequest;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        return response()->json(Rol::all());
    }

    public function store(RolRequest $request)
    {
        $rol = Rol::create($request->validated());
        return response()->json($rol, 201);
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return response()->json($rol);
    }

    public function update(RolRequest $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->validated());
        return response()->json($rol);
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return response()->json(null, 204);
    }
} 