<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\CompanyContract;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Company extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   CompanyContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return CompanyContract::TRANSLATE[$value];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setIconAttribute($value)
    {

        $disk = config('backpack.base.root_disk_name');
        $destination_path = "public/uploads";

        if (is_null($value)) {
            \Storage::disk($disk)->delete($this->{CompanyContract::ICON});
            $this->attributes[CompanyContract::ICON] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            \Storage::disk($disk)->delete($this->{CompanyContract::ICON});
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[CompanyContract::ICON] = $public_destination_path.'/'.$filename;
        }
    }
}
