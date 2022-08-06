<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['user_id', 'title', 'slug', 'content', 'thumbnail_url', 'is_public'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function(self $blog) {
            $blog->deleteFile($blog->thumbnail_url);
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

    public function getThumbnailAttribute()
    {
        return asset('storage/uploads/'.$this->thumbnail_url);
    }

    public function getUsernameAttribute()
    {
        return $this->user ? $this->user->name : 'User';
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

    public function scopeRecent($query, $limit = 3)
    {
        return $query->orderByDesc('created_at')->take($limit);
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }
}
