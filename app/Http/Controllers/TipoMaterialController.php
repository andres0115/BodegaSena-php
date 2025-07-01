<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoMaterial::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipoMaterial = TipoMaterial::create($request->all());
        return response()->json($tipoMaterial, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMaterial $tipoMaterial)
    {
        return $tipoMaterial;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoMaterial $tipoMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoMaterial $tipoMaterial)
    {
        $tipoMaterial->update($request->all());
        return response()->json($tipoMaterial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoMaterial $tipoMaterial)
    {
        $tipoMaterial->delete();
        return response()->json(null, 204);
    }
}
