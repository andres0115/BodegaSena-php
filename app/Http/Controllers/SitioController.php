<?php

namespace App\Http\Controllers;

use App\Models\Sitio;
use Illuminate\Http\Request;

class SitioController extends Controller
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
        return Sitio::all();
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
        $sitio = Sitio::create($request->all());
        return response()->json($sitio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sitio $sitio)
    {
        return $sitio;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sitio $sitio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sitio $sitio)
    {
        $sitio->update($request->all());
        return response()->json($sitio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sitio $sitio)
    {
        $sitio->delete();
        return response()->json(null, 204);
    }
}
