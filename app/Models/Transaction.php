<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use softDeletes;

    protected $guarded = ['creared_at', 'updated_at'];

    //Relation Many to Many (ProductTransaction)
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
