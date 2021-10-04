<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Retorna os dados da conta de um usuário com suas respectivas transações
     *
     * @param  \Request  $request
     * @return response
     *
     */
    public function getUserAccountInfo(Request $request)
    {
        $userData = $request->user();

        $userAccount = User::find($userData->id)->account()->first();

        $accountTransactions = $userAccount->transactions()->orderBy('postdate', 'desc')->get();

        $response = [
            'userData' => $userData,
            'userAccount' => $userAccount,
            'accountTransactions' => $accountTransactions,
        ];

        return response($response, 200);

    }
}