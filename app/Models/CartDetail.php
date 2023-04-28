<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected  $table = "cart_details";

    protected $fillable = [
        "cart_id",
        "program_id",
        "quantity",
    ];

    public function Cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function Program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function Options()
    {
        return $this->hasMany(CartDetailOptions::class, 'cart_detail_id', 'id');
    }
}
