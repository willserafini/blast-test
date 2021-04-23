<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Number extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $guarded = [];

    protected $table = 'numbers';

    protected $dates = ['deleted_at'];

    protected $cascadeDeletes = ['number_preferences'];

    protected $attributes = [
        'status' => 1
    ];

    public function costumer() 
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function number_preferences() 
    {
        return $this->hasMany(NumberPreference::class);
    }

    public function getStatusAttribute($attribute) 
    {
        if (!$attribute) {
            return '';
        }

        return $this->getStatusOptions()[$attribute];
    }

    public function getStatusOptions() 
    {
        return [
            1 => 'Active',
            2 => 'Inactive',
            3 => 'Cancelled'
        ];
    }
}
