<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreElementoRequest;
use App\Http\Requests\UpdateElementoRequest;
use App\Models\Elemento;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ElementoController extends Controller
{
    public function index(): JsonResponse
    {

        $elemento = Elemento::all();

        $message = $elemento->isEmpty()
            ? 'No hay elementos registrados'
            : 'Lista de elementos';

        return response()->json([
            'message' => $message,
            'data'    => $elemento,
        ], Response::HTTP_OK);
    }

    public function store(StoreElementoRequest $request): JsonResponse
    {
        $data = $request->validated();

        $elemento = Elemento::create($data);
        return response()->json([
            'message'   =>  'Elemento creado con éxito',
            'data'      =>  $elemento,
        ], Response::HTTP_CREATED)
            ->header('Location', route('elementos.show', $elemento));
    }

   
    public function show(Elemento $elemento): JsonResponse
    {
        return response()->json([
            'message'   =>  'Elemento obtenido con éxito',
            'data'      =>  $elemento
        ], Response::HTTP_OK);
    }


    public function update(UpdateElementoRequest $request, Elemento $elemento): JsonResponse
    {

        $elemento->update($request->validated());

        return response()->json([
            'message'   =>  'elemento modficado con éxito',
            'data'      => $elemento
        ], Response::HTTP_OK);
    }


    public function destroy(Elemento $elemento): JsonResponse
    {
        $elemento->delete();


        // 204 No Content, sin cuerpo
        //return response()->noContent();

        return response()->json([
            'message'   =>  'Elemento eliminado con exito'
        ], Response::HTTP_OK);
    }
}
