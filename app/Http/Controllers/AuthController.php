<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        try {
            $user = User::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Usuario creado con éxito',
                'data'    => $user,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::error('Error creando usuario: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'No se pudo crear el usuario',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {

        $credentials = $request->validated();

        try {

            if (! $token = auth('api')->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Credenciales inválidas.',
                ], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json([
                'success' => true,
                'message' => 'Autenticación exitosa',
                'data'    => [
                    'access_token' => $token,
                    'token_type'   => 'Bearer',
                    'expires_in'   => JWTAuth::factory()->getTTL() * 60,
                ],
            ], Response::HTTP_OK);
        } catch (JWTException $e) {

            Log::error('Error generando JWT: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error interno al generar el token.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUser(): JsonResponse
    {
        try {
            $user = auth('api')->user();

            if (! $user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no autenticado.',
                ], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json([
                'success' => true,
                'message' => 'Usuario obtenido con éxito.',
                'data'    => $user,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error('Error obteniendo usuario: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error interno al obtener el usuario.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
    public function refresh(): JsonResponse
    {
        try {
            // 1. Obtener el token actual
            $currentToken = JWTAuth::getToken();
            if (! $currentToken) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se proporcionó token.',
                ], Response::HTTP_BAD_REQUEST);
            }

            // 2. Refrescar el token
            $newToken = JWTAuth::refresh($currentToken);

            // 3. Responder con el nuevo token
            return response()->json([
                'success' => true,
                'message' => 'Token refrescado correctamente.',
                'data'    => [
                    'access_token' => $newToken,
                    'token_type'   => 'Bearer',
                    'expires_in'   => JWTAuth::factory()->getTTL() * 60,
                ],
            ], Response::HTTP_OK);
        } catch (JWTException $e) {
            // 4a. Error específico de JWT (p.ej. token expirado o inválido)
            Log::error('Error refrescando JWT: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'No se pudo refrescar el token.',
            ], Response::HTTP_UNAUTHORIZED);
        } catch (\Exception $e) {
            // 4b. Cualquier otro error inesperado
            Log::error('Error interno refrescando el token: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error interno al procesar la solicitud.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
