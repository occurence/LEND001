<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transact extends Model
{
    use HasFactory;
    public function accounts(){
        return $this->belongsToMany('App\Models\Account', 'id', 'user');
    }
    public function reqs(){
        return $this->belongsTo('App\Models\Req');
    }
}
