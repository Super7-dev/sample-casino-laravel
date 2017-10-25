<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function credit() {
        return $this->belongsTo(Credit::class);
    }
}
