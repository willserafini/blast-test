<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($idPermission)
    {
        return $this->permissions()->where('permissions.id', $idPermission)->exists();
    }

    public function getIsAdminAttribute($attribute)
    {
        return self::getOptionsIsAdmin()[$attribute];
    }

    public static function getOptionsIsAdmin()
    {
        return [
            0 => 'No',
            1 => 'Yes'
        ];
    }
    
}
