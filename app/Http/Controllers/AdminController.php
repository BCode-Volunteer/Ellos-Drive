<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Exceptions\UsuarioCadastradoException;
use App\Http\Requests\RegisterRequest;
use App\Services\IAuthService;
use App\Services\ResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//TODO: fazer requisicao passando token de admin(salva em algum lugar saporra)
//TODO: criar gerador de senha
class AdminController extends Controller
{
    public function __construct(protected IAuthService $authService) {}

    public function registerClient(RegisterRequest $request)
    {
        $credentials = $request->validated();
        $role = RoleEnum::CLIENT->value;
        try {
            $this->authService->register($credentials, $role);
        } catch(UsuarioCadastradoException $e) {
            //
        }
    }
}
