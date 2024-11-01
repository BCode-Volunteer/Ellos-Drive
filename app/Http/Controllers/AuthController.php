<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\IAuthService;
use Exception;

class AuthController extends Controller
{
    public function __construct(
        protected IAuthService $authService
    ) {}

    public function index()
    {
        return auth()->user();
    }
    public function login(LoginRequest $request)
    {
        try{
            $credentials = $request->validated();
            $token = $this->authService->login($credentials);
            $user = User::where('email', $credentials['email'])->firstOrFail();
            
            session()->put('auth', $token);
            
            if($user->role === RoleEnum::ADMIN->value) {
                return redirect()->route('admin.register.view', ['token' => $token]);
            }
            return redirect(env('GOOGLE_DRIVE'));
        } catch(Exception $e){
            $errorMessage = $e->getMessage();
            return view('auth.login-page')->with('errorMessage', $errorMessage);
        }
    }
}
