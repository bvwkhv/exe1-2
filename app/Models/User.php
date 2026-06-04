<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Cách này là đủ, không cần dùng #[Fillable] bên trên class nữa
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'likes',
        // 'dislikes',
    ];

    // Cách này cũng đủ, không cần dùng #[Hidden] bên trên class nữa
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}