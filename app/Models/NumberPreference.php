<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NumberPreference extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function number() 
    {
        return $this->belongsTo(Number::class, 'number_id');
    }

}
