<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function account() {
        return $this->hasOne(Account::class);
    }

    public function credit() {
        return $this->hasOne(Credit::class);
    }
}
