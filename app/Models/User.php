<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'email_verified_at',
    ];

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

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
