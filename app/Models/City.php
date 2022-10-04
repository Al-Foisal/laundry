<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function areas() {
        return $this->hasMany(Area::class);
    }
    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug']  = Str::slug($value);
    }
}
