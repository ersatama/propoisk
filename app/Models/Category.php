<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Domain\Contracts\CategoryContract;

class Category extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   CategoryContract::FILLABLE;

    public function getBlockedAttribute($value)
    {
        return CategoryContract::TRANSLATE[$value];
    }

    public function setIconAttribute($value)
    {

        $disk = config('backpack.base.root_disk_name');
        $destination_path = "public/uploads";

        if (is_null($value)) {
            \Storage::disk($disk)->delete($this->{CategoryContract::ICON});
            $this->attributes[CategoryContract::ICON] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            \Storage::disk($disk)->delete($this->{CategoryContract::ICON});
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[CategoryContract::ICON] = $public_destination_path.'/'.$filename;
        }
    }

    public function setImgAttribute($value)
    {

        $disk = config('backpack.base.root_disk_name');
        $destination_path = "public/uploads";

        if (is_null($value)) {
            \Storage::disk($disk)->delete($this->{CategoryContract::IMG});
            $this->attributes[CategoryContract::IMG] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            \Storage::disk($disk)->delete($this->{CategoryContract::IMG});
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[CategoryContract::IMG] = $public_destination_path.'/'.$filename;
        }
    }
}
