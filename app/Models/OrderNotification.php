<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNotification extends Model {
    use HasFactory;
    protected $guarded = [];

    public function deliveryman() {
        return $this->belongsTo(Deliveryman::class);
    }

    public function partner() {
        return $this->belongsTo(Partner::class);
    }

    public function orderStatus() {
        return $this->belongsTo(OrderStatus::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
