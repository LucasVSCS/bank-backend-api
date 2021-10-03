<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $incrementing = false;
    protected $guarded = [];
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $timestamps = false;
    const UPDATED_AT = 'postdate';

    public function transactionType()
    {
        return $this->hasOne(TransactionType::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

}
