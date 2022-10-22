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

    public function partner() {
        return $this->belongsTo(Partner::class);
    }
    public function deliveryman() {
        return $this->belongsTo(Deliveryman::class);
    }
}
