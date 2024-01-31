<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public $table = 'users';

    protected $fillable = [
        'id', 'name', 'email', 'user_type', 'phone_number', 'image', 'email_verified_at', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

        public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function dates()
    {
        return $this->hasMany(Date::class, 'user_id');
    }

    //berpunca di sini sahaja, silap sebab guna hasOne

        public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
