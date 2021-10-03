<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\TransactionType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function withdrawAccountBalance(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'withdrawAmount' => 'numeric|required',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'Digite um número válido.'], 422);
        }

        $account = $this->getAuthUserAccountData($request);

        if ($request->withdrawAmount > $account->current_balance) {
            return response(['message' => 'Saldo insuficiente.'], 422);
        }

        $account->current_balance -= $request->withdrawAmount;

        if ($account->save()) {

            $transaction = new Transaction([
                'code' => Str::uuid(),
                'transaction_type_id' => TransactionType::WITHDRAW_TRANS_CODE,
                'amount' => $request->withdrawAmount,
                'last_balance' => $account->getOriginal('current_balance'),
                'description' => 'Usuário realizou o saque no valor solicitado.',
            ]);

            $account->transactions()->save($transaction);

            return response(['message' => 'Sucesso atualizando o saldo da conta!'], 200);
        } else {
            return response(['message' => 'Erro ao atualizar o saldo da conta.'], 500);
        }

    }

    public function depositAccountBalance(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'depositAmount' => 'numeric|required',
        ]);

        if ($validator->fails()) {
            return response(['message' => 'Digite um número válido.'], 422);
        }

        $account = $this->getAuthUserAccountData($request);

        $account->current_balance += $request->depositAmount;

        if ($account->save()) {

            $transaction = new Transaction([
                'code' => Str::uuid(),
                'transaction_type_id' => TransactionType::DEPOSIT_TRANS_CODE,
                'amount' => $request->depositAmount,
                'last_balance' => $account->getOriginal('current_balance'),
                'description' => 'Usuário realizou o depósito no valor solicitado.',
            ]);

            $account->transactions()->save($transaction);

            return response(['message' => 'Sucesso atualizando o saldo da conta!'], 200);
        } else {
            return response(['message' => 'Erro ao atualizar o saldo da conta.'], 500);
        }

    }

    public function getAuthUserAccountData($request)
    {
        $userData = $request->user();

        $userAccount = User::find($userData->id)->account()->first();

        return $userAccount;

    }
}
