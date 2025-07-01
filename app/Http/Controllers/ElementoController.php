<?php


namespace App\Http\Controllers;

use App\Models\CategoriaElemento;
use Illuminate\Http\Request;

class ElementoController extends Controller
{
    public function index()
    {
        return response()->json(CategoriaElemento::all());
    }

    public function store(Request $request)
    {
        $categoria = CategoriaElemento::create($request->all());
        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = CategoriaElemento::findOrFail($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = CategoriaElemento::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = CategoriaElemento::findOrFail($id);
        $categoria->delete();
        return response()->json(null, 204);
    }
}
