<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instansi extends Model
{
    use HasFactory;
    protected $table = 'instansis';
    protected $fillable = ['namaInstansi'];

    public function user(): BelongsTo
    {
        //return $this->belongsTo(User::class);
        return $this->hasMany(User::class);
    }
}
