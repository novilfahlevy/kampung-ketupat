<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['photo_id', 'title', 'slug', 'content', 'thumbnail_url', 'is_public'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function(self $blog) {
            $blog->deleteFile($blog->thumbnail_url);
        });
    }

    public function photos()
    {
        return $this->hasMany(BlogPhoto::class, 'blog_id', 'id');
    }

    // Custom Attributes

    public function getThumbnailAttribute()
    {
        return asset('storage/uploads/'.$this->thumbnail_url);
    }
}
