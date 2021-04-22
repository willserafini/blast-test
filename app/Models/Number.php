<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'numbers';

    public function costumer() 
    {
        return $this->belongsTo(Customer::class, 'customer_id');
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
