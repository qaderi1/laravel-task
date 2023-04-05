<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fullName;

    protected $fillable = [
        'name',
        'family',
        'user_phone',
    ];


    public function getFullName()
    {
        return $this->name . '' . $this->family;
    }

    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function getEndCall()
    {
        return  $this->calls()->orderBy('created_at', 'desc')->first();
    }
}