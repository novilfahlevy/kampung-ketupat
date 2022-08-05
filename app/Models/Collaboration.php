<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['name', 'logo_url'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function(self $collaboration) {
            $collaboration->deleteFile($collaboration->logo_url);
        });
    }

    // Custom Attributes

    public function getLogoAttribute()
    {
        return asset('storage/uploads/'.$this->logo_url);
    }
}
