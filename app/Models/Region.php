<?php

namespace App\Models;

use App\Domain\Contracts\RegionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Region extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   RegionContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return RegionContract::TRANSLATE[$value];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
