<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Domain\Contracts\FilterContract;

class Filter extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   FilterContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return FilterContract::TRANSLATE[$value];
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

}
