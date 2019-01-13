<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Insulin extends Model
{
    protected $fillable = [
        'dose', 'user_id', 'time'
    ];

    protected $dates = ['time'];

    public function setDoseAttribute($dose){
        $this->attributes['dose'] = (int)($dose*10);
    }

    public function setTimeAttribute($date)
    {
        $this->attributes['time'] = Carbon::parse($date);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
