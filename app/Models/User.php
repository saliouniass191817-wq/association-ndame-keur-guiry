<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'email',
        'password',
        'role',
        'sex',
        'civility',
        'profession',
        'age',
        'bio',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'age' => 'integer',
            'password' => 'hashed',
        ];
    }

    protected function fullName(): Attribute
    {
        return Attribute::get(fn () => collect([
            $this->first_name,
            $this->second_name,
            $this->last_name,
        ])->filter()->implode(' '));
    }

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }

    public function projectProposals(): HasMany
    {
        return $this->hasMany(ProjectProposal::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
