<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    public function getSettingAttribute()
    {
        $setting = [];
        $this->all()->each(function ($item) use (&$setting) {
            $setting[$item['key']] = $item['value'];
        });
        return $setting;
    }
}
