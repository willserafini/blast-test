<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //protected $fillable = ['name'];

    protected $guarded = [];

    protected $table = 'customers';

    /*protected $attributes = [
        'active' => 1
    ];*/

    /*public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function scopeInactive($query) {
        return $query->where('active', 0);
    }*/

    /*public function company() {
        return $this->belongsTo(Company::Class);
    }*/

    public function numbers() 
    {
        return $this->hasMany(Number::class);
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
            1 => 'New',
            2 => 'Active',
            3 => 'Suspended',
            4 => 'Cancelled'
        ];
    }
}
