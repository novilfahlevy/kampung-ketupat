<?php

namespace App\Models;

use App\Scopes\NewestFirstScope;
use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['user_id', 'title', 'slug', 'content', 'big_thumbnail_url', 'medium_thumbnail_url', 'small_thumbnail_url', 'is_public'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new NewestFirstScope);
        static::deleted(function(self $blog) {
            $blog->deleteFile($blog->big_thumbnail_url);
            $blog->deleteFile($blog->medium_thumbnail_url);
            $blog->deleteFile($blog->small_thumbnail_url);
        });
    }

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(BlogPhoto::class, 'blog_id', 'id');
    }

    // Custom Attributes

    public function getBigThumbnailAttribute()
    {
        return asset('storage/uploads/'.$this->big_thumbnail_url);
    }

    public function getMediumThumbnailAttribute()
    {
        return asset('storage/uploads/'.$this->medium_thumbnail_url);
    }

    public function getSmallThumbnailAttribute()
    {
        return asset('storage/uploads/'.$this->small_thumbnail_url);
    }

    public function getUsernameAttribute()
    {
        return $this->user ? $this->user->name : config('app.name');
    }
    
    public function getShortContentAttribute()
    {
        return strlen($this->content) >= 50 ? substr($this->content, 0, 50).'...' : $this->content;
    }

    // Scopes

    public function scopeKeyword($query, $keyword)
    {
        return $query->where('title', 'LIKE', '%'.$keyword.'%');
    }

    public function scopeRecent($query, $limit = 3, $slug = null)
    {
        if ($slug) $query->where('slug', '!=', $slug);
        return $query->take($limit);
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }
}
