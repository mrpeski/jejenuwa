<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    


    public function transaction() {
        return $this->hasMany('App\ProductFlow');
    }

    public function warehouse() {
        return $this->belongsTo('App\Warehouse');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }


    public function isSuperAdmin() {
        return  1 === intval($this->role_id); 
    }

    public function isManager() {
        return 2 === intval($this->role_id); 
    }

    public function isAdmin() {
        return 3 === $this->role_id; 
    }

    public function isStaff() {
        return 4 === intval($this->role_id); 
    }
    
    public function isNew() {
        return 5 === intval($this->role_id); 
    }
    
}
