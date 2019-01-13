<?php

namespace App;

use App\HbA1c;
use App\Insulin;
use App\Sugar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function HbA1cs()
    {
        return $this->hasMany(HbA1c::class);
    }

    public function insulins()
    {
        return $this->hasMany(Insulin::class);
    }

    public function sugars()
    {
        return $this->hasMany(Sugar::class);
    }
}
