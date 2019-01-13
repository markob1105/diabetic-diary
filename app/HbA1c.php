<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HbA1C extends Model
{
    protected $fillable = [
            'value', 'user_id', 'time'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
