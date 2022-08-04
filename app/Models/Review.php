<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'review', 'stars', 'is_public'];

    // Attributes

    public function getStatusAttribute()
    {
        return $this->is_public ? 'Terpublikasi' : 'Belum terpublikasi';
    }
}
