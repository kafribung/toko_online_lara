<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use softDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    // Relation One to Many (Gallery)
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    //Relation Many to Many (ProductTransaction)
    public function transactions()
    {
        return $this->belongsToMany('App\Models\Transaction');
    }
}
