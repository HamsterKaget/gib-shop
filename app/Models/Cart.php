<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected  $table = "cart";

    protected $fillable = [
        "user_id",
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Details()
    {
        return $this->hasMany(CartDetail::class);
    }
}
