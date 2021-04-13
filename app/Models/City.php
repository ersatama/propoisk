<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\CityContract;
use App\Models\Region;

class City extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   CityContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return CityContract::TRANSLATE[$value];
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
