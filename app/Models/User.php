<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Jabatan;
use App\Models\Instansi;
use App\Models\Dispo;
use App\Models\penerima;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_wa',
        'grade',
        'jabatan_id',
        'instansi_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function instansi(): BelongsTo
    {
       
        return $this->belongsTo(Instansi::class);
    }

    public function jabatan(): BelongsTo
    {
        
        return $this->belongsTo(Jabatan::class);
    }

     public function dispo(): BelongsTo
    {
        
        return $this->belongsTo(Dispo::class);
    }

    public function penerima(): BelongsTo
    {
        
        return $this->belongsTo(Penerima::class);
    }
}
