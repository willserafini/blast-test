<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

use App\Models\User;

class Customer extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    //protected $fillable = ['name'];

    protected $guarded = [];

    protected $table = 'customers';

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'status' => 1
    ];

    protected $casts = [
        'permissions' => 'array'
    ];

    protected $cascadeDeletes = ['numbers'];

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

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute($attribute) 
    {
        if (!$attribute) {
            return '';
        }

        return $this->getStatusOptions()[$attribute];
    }

    public function getUsersCanSee()
    {
        if (empty($this->permissions)) {
            return [];
        }
        
        return User::whereIn('id', $this->permissions['users'])->get();
    }

    public function userIsAllowed($user)
    {
        if ($this->user_id == \Illuminate\Support\Facades\Auth::id()) {
            return true;
        }

        if (empty($this->permissions)) {
            return false;
        }

        return in_array($user->id, $this->permissions['users']);
    }

    public function setPermissionsAttribute($permissions)
    {
        if (!$permissions) {
            return $this->attributes['permissions'] = null;
        }

        foreach ($permissions['users'] as $key => $user_id) {
            $permissions['users'][$key] = (int) $user_id;
        }

        $this->attributes['permissions'] = json_encode($permissions, JSON_ERROR_NONE);
    }

    public function userIsInPermissions($user)
    {
        if (empty($this->permissions)) {
            return false;
        }

        return in_array($user->id, $this->permissions['users']);
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
