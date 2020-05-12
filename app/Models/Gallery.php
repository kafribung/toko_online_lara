<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gallery extends Model
{
    use SoftDeletes;

    protected $touches = ['product'];

    protected $guarded = ['created_at','updated_at'];

    // Relation  many to one (Gallery to product )
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    // Mutator url API
    public function getImageAttribute($value)
    {
        return url('products', $value);
    }
}
