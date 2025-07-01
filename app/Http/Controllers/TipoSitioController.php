<?php

namespace App\Http\Controllers;

use App\Models\TipoSitio;
use Illuminate\Http\Request;

class TipoSitioController extends Controller
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
        return TipoSitio::all();
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
        $tipoSitio = TipoSitio::create($request->all());
        return response()->json($tipoSitio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoSitio $tipoSitio)
    {
        return $tipoSitio;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoSitio $tipoSitio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoSitio $tipoSitio)
    {
        $tipoSitio->update($request->all());
        return response()->json($tipoSitio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoSitio $tipoSitio)
    {
        $tipoSitio->delete();
        return response()->json(null, 204);
    }
}
