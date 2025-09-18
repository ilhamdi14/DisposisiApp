<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Dispo;


class Memo extends Model
{
    use HasFactory;
    protected $table = 'memo';
    protected $fillable = ['tujuan', 'perihal', 'sifat_surat', 'file', 'isi_surat', 'tgl_surat', 'no_surat', 'status','pengirim_id'];

     
    public function dispo(): BelongsTo
    {
        //return $this->belongsTo(User::class);
        return $this->hasMany(Dispo::class);
    }

}

