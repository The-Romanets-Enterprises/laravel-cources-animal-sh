<?php

namespace App\Models;

 //use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Role;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\UserRequest;
use App\Mail\CreateUserMail;
 use Illuminate\Auth\Events\Registered;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

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
        'email_verified_at',
        'phone',
        'role',
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

    public function __toString()
    {
        return $this->full_name ?? '';
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function animalPets()
    {
        return $this->hasMany(AnimalPet::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    // full_name
    public function getFullNameAttribute()
    {
        return "{$this->lastname} {$this->name}";
    }

    public static function getRegularUsers()
    {
        $users = self::query();

        $users->with('address');
        $users->where('role', Role::USER);

        return $users->get();
    }

    public static function registerUser(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = Role::USER;

        $user = self::query()->create($data);

        event(new Registered($user));

        return $user;
    }

    public static function createUser(UserRequest $request)
    {
        $data = $request->validated();
        $password = Str::password(
            length: 8,
        );
        $data['password'] = bcrypt($password);
        $data['email_verified_at'] = now()->toDateString();

        $user = User::query()->create($data);

        if (!$user) {
            return false;
        }

        try {
            $result = Mail::to([$request->email])->send(new CreateUserMail($user, $password));
        } catch (\Exception $e) {
            $user->delete();

            return false;
        }

        return $result;
    }

    public static function updateUser(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        return $user->update($data);
    }

    public static function deleteUser(User $user)
    {
        if ($user->id == auth()->id()) {
            return null;
        }

        return $user->delete();
    }

}
