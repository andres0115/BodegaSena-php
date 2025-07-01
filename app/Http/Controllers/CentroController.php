<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index()
    {
        return Centro::all();
    }

    public function show($id)
    {
        return Centro::findOrFail($id);
    }

    public function store(Request $request)
    {
        $centro = Centro::create($request->all());
        return response()->json($centro, 201);
    }

    public function update(Request $request, $id)
    {
        $centro = Centro::findOrFail($id);
        $centro->update($request->all());
        return response()->json($centro, 200);
    }

    public function destroy($id)
    {
        Centro::destroy($id);
        return response()->json(null, 204);
    }
} 