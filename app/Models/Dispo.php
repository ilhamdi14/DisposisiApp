<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Memo;
use App\Models\User;
use App\Models\Penerima;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispo extends Model
{
    protected $table = 'dispos';
    protected $fillable = ['memo_id', 'user_id', 'kepada_user_id', 'catatan', 'status','penerima_id'];

    public function memo(): BelongsTo
    {
       
        return $this->belongsTo(Memo::class);
    }

    public function pengirim(): BelongsTo
    {
       
        return $this->belongsTo(User::class, 'user_id');
    }
    public function penerima(): BelongsTo
    {
       
        return $this->belongsTo(User::class, 'kepada_user_id');
    }
}
