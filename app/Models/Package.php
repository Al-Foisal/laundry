<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model {
    use HasFactory;
    protected $guarded = [];
    protected $dates   = ['j_from', 'c_to'];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
