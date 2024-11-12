<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';
    protected $guarded = [
        'id'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class,);
    }
}
