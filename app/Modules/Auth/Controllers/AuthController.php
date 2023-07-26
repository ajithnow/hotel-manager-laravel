<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Resources\LoginResource;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/auth/login",
     *     operationId="login",
     *     summary="User login",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="user_name", type="string", example="user@example.com"),
     *             @OA\Property(property="password", type="string", example="yourpassword")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *         @OA\JsonContent(type="string")
     *     ),
     *     @OA\Response(
     *         response=503,
     *         description="Invalid login",
     *         @OA\JsonContent(type="string")
     *     )
     * )
     */

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->user_name)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return (new LoginResource(['invalid login']))->response()->setStatusCode(503);
        }
        $token = $user->createToken('token')->plainTextToken;
        return (new LoginResource(['token' => $token]))->response()->setStatusCode(200);
    }
}
