<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPhoto extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['blog_id', 'photo_url'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function(self $blogPhoto) {
            $blogPhoto->deleteFile($blogPhoto->photo_url);
        });
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    // Custom Attributes

    public function getPhotoAttribute()
    {
        return asset('storage/uploads/'.$this->photo_url);
    }
}
