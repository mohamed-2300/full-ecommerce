<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'role'
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

    public function isAdmin(): bool
    {
        return $this->hasRole(('admin'));
    }
     
    public function isEditor(): bool
    {
        return $this->hasRole(('editor'));
    }
    
    public function isUser(): bool
    {
        return $this->hasRole(('user'));
    }

    public function hasRole(string $role): bool
    {
        return $this->getAttribute(('role')) === $role;
    }

    public function getRedirectRoute() {
        if ($this->isAdmin()) {
            return 'admin_dashboard';
        } else if ($this->isEditor()) {
            return 'editor_dashboard';
        }
        return 'dashboard';
    }

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
}
