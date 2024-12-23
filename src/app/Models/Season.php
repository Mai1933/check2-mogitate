<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';
    protected $guarded = [
        'id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,);
    }
}
