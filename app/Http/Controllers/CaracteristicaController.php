<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use Illuminate\Http\Request;

class CaracteristicaController extends Controller
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
        return Caracteristica::all();
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
        $caracteristica = Caracteristica::create($request->all());
        return response()->json($caracteristica, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Caracteristica $caracteristica)
    {
        return $caracteristica;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caracteristica $caracteristica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caracteristica $caracteristica)
    {
        $caracteristica->update($request->all());
        return response()->json($caracteristica);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caracteristica $caracteristica)
    {
        $caracteristica->delete();
        return response()->json(null, 204);
    }
}
