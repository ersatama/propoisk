<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Domain\Contracts\UserContract;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable;

    protected $fillable =   UserContract::FILLABLE;
    protected $hidden   =   UserContract::HIDDEN;
    protected $casts    =   UserContract::CASTS;

    public function getCreatedAtAttribute($value)
    {
        return UserContract::dateCheck($value);
    }

    public function getBirthDateAttribute($value)
    {
        return UserContract::dateCheck($value);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return UserContract::verifiedCheck($value);
    }

    public function getPhoneVerifiedAtAttribute($value)
    {
        return UserContract::verifiedCheck($value);
    }

    public function getStatusAttribute($value)
    {
        return UserContract::getCheck($value);
    }

    public function getBlockedAttribute($value)
    {
        return UserContract::getCheck($value);
    }

}
