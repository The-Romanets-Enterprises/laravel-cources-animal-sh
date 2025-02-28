<?php

namespace App\Models;

use App\Enums\Role;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
        'lastname',
        'email',
        'password',
        'role',
        'activation_token',
        'activation_expires_at',
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
            'role' => Role::class,
        ];
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public static function getRegularUsers()
    {
        $users = self::query();

        $users->with('address');
        $users->where('role', Role::USER);

        return $users->get();
    }

    // Методы для проверки ролей
    public function isAdmin(): bool
    {
        return $this->role === Role::ADMIN;
    }

    public function isEmployee(): bool
    {
        return $this->role === Role::EMPLOYEE;
    }

    public function isUser(): bool
    {
        return $this->role === Role::USER;
    }

    // Переопределяем метод для хеширования пароля перед сохранением
    protected static function booted()
    {
        static::creating(function ($user) {
            if ($user->password) {
                $user->password = Hash::make($user->password);
            }
        });
    }

    // Переопределяем метод для форматирования даты активации
    public function getActivationExpiresAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }
}
