<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['photo_url', 'photo_width', 'photo_height', 'description'];

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
    
    // Scopes

    public function scopeKeyword($query, $keyword)
    {
        return $query->where('description', 'LIKE', '%'.$keyword.'%');
    }

    public function scopeRecent($query, $limit = 6)
    {
        return $query->orderByDesc('created_at')->take($limit);
    }

    public function scopeLandscape($query)
    {
        return $query->orderByRaw('IF(photo_height <= photo_width, 0, 1)');
    }
}
