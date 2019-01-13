<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sugar extends Model
{
    protected $fillable = [
        'value', 'user_id', 'time'
    ];

    protected $dates = ['time'];

    public function setValueAttribute($value){
        $this->attributes['value'] = (int)($value*10);
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
