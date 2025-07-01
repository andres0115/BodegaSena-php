<?php

namespace App\Http\Controllers;

use App\Models\TipoMovimiento;
use Illuminate\Http\Request;

class TipoMovimientoController extends Controller
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
        return TipoMovimiento::all();
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
        $tipoMovimiento = TipoMovimiento::create($request->all());
        return response()->json($tipoMovimiento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMovimiento $tipoMovimiento)
    {
        return $tipoMovimiento;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoMovimiento $tipoMovimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoMovimiento $tipoMovimiento)
    {
        $tipoMovimiento->update($request->all());
        return response()->json($tipoMovimiento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoMovimiento $tipoMovimiento)
    {
        $tipoMovimiento->delete();
        return response()->json(null, 204);
    }
}
