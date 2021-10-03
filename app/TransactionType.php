<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    const DEPOSIT_TRANS_CODE = 1;
    const WITHDRAW_TRANS_CODE = 2;
}
