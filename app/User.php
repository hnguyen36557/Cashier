<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Billable;
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart() {
        return $this->hasMany(Cart::class);
        return $this->hasMany(Cart::class);
    }
}
