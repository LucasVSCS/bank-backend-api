<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUserAccountInfo(Request $request)
    {
        $userData = $request->user();

        $userAccount = User::find($userData->id)->account()->first();

        $response = [
            'userData' => $userData,
            'userAccount' => $userAccount,
        ];

        return response($response, 200);

    }
}
