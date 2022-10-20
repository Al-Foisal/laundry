<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;
    protected $guarded = [];

    public function orderIdentity() {
        return $this->hasOne(OrderIdentity::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class);
    }
}
