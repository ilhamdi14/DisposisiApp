<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\User;

use Illuminate\Database\Eloquent\Model;

class Memopimpinan extends Model
{
    protected $table = 'memopimpinan';
    use HasFactory;
    protected $fillable = [
        'perihal',
        'sifat_surat',
        'catatan',
        'status',
        'pimpinan_id',
    ];

    public function user(): BelongsTo
    {
       
        return $this->belongsTo(User::class);
    }
}
