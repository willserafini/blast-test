<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //protected $fillable = ['name'];

    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function scopeInactive($query) {
        return $query->where('active', 0);
    }

    public function company() {
        return $this->belongsTo(Company::Class);
    }

    public function getActiveAttribute($attribute) {
        return $this->getActiveOptions()[$attribute];
    }

    public function getActiveOptions() {
        return [
            1 => 'Active',
            0 => 'Inactive',            
        ];
    }
}
