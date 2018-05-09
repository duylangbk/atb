<?php

namespace App\Http\Controllers;


use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $userService;

    /**
     * Create a new AuthController instance.
     * @param $userService
     */
    public function __construct(
        UserServiceInterface $userService
    ) {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->userService = $userService;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * @param Request $request
     * @return \App\User
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'address' => 'string|required',
            'tel' => 'string|required',
        ]);
        return $this->userService->updateUser(auth('api')->user(), $request->all());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}