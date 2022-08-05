<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'review', 'stars', 'is_public'];

    // Custom Attributes

    public function getStatusAttribute()
    {
        return $this->is_public ? 'Terpublikasi' : 'Belum terpublikasi';
    }

    // Scopes

    public function scopeKeyword($query, $keyword)
    {
        return $query
            ->where('name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('email', 'LIKE', '%'.$keyword.'%')
            ->orWhere('review', 'LIKE', '%'.$keyword.'%');
    }
}
