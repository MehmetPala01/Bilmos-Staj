<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendDuty extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'duty_id',
        'situation',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function duty()
    {
        return $this->belongsTo(Duty::class, 'duty_id');
    }
}
