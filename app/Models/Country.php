<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\CountryContract;

class Country extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   CountryContract::FILLABLE;
    public function getBlockedAttribute($value)
    {
        return CountryContract::TRANSLATE[$value];
    }

}
