<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\SubCategoryContract;
use App\Models\Category;

class SubCategory extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   SubCategoryContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return SubCategoryContract::TRANSLATE[$value];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
