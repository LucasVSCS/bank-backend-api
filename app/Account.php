<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType()
    {
        return $this->hasOne(AccountType::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
