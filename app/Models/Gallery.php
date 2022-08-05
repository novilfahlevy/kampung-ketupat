<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['photo_url', 'description'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function(self $gallery) {
            $gallery->deleteFile($gallery->photo_url);
        });
    }

    // Custom Attributes

    public function getPhotoAttribute()
    {
        return asset('storage/uploads/'.$this->photo_url);
    }
}
