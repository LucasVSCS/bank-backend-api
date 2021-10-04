<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Realizar o login dado as credenciais de um usuário
     *
     * @param  \Request  $request
     * @return response
     *
     */
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Credenciais inválidas']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }

    /**
     * Realiza o logoff de um usuário autenticado
     *
     * @param  \Request  $request
     * @return response
     *
     */
    public function logout(Request $request)
    {
        $token = $request->user()->token();

        if (!$token->revoke()) {
            return response(['message' => 'Erro ao deslogar usuário.'], 200);
        }

        return response(['message' => 'Usuário deslogado com sucesso!'], 200);
    }
}