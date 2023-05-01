<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "order_details";

    protected $fillable = [
        'order_id',
        'program_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function orderDetailOptions()
    {
        return $this->hasMany(OrderDetailOptions::class);
    }
}
