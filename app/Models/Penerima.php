<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table = 'penerimas';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
