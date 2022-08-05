<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'action'];

    // Scopes

    public function scopeKeyword($query, $keyword)
    {
        return $query
            ->where('username', 'LIKE', '%'.$keyword.'%')
            ->orWhere('action', 'LIKE', '%'.$keyword.'%');
    }
}
