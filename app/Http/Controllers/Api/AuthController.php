<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function __constructor()
  {
    $this->authorizeResource(User::class, 'user');
  }

  public function register(Request $request): JsonResponse
  {
    $data = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required|confirmed',
      'role' => 'in:vendedor,gerente,diretor,diretor_geral'
    ]);
    $userData = array_merge($data, ['role' => $data['role'] ?? 'vendedor']);

    $user = User::create($userData);
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
      'user' => new UserResource($user),
      'token' => $token,
      'Type' => 'Bearer'
    ]);
  }

  /**
   * @throws ValidationException
   */
  public function login(Request $request): JsonResponse
  {
    $fields = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $user = User::where('email', $fields['email'])->first();
    if (!$user || !Hash::check($fields['password'], $user->password)) {
      throw ValidationException::withMessages(['message' => ['Credenciais inválidas']]);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
      'user' => new UserResource($user),
      'token' => $token,
      'Type' => 'Bearer'
    ]);
  }

  public function logout(Request $request): JsonResponse
  {
    $request->user()->tokens()->delete();
    return response()->json([
      'message' => 'Logged out successfully'
    ]);
  }
}
