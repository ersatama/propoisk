<?php

namespace App\Models;

use App\Domain\Contracts\GlobalFilterContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class GlobalFilter extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   GlobalFilterContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return GlobalFilterContract::TRANSLATE[$value];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
