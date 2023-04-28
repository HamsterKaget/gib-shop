<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartDetailOptions extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cart_detail_options";

    protected $fillable = [
        "cart_detail_id",
        "program_option_id",
        "option_value_id",
        "quantity",
    ];

    public function CartDetail()
    {
        return $this->belongsTo(CartDetail::class, 'cart_detail_id');
    }

    public function ProgramOption()
    {
        return $this->belongsTo(ProgramOption::class, 'program_option_id');
    }

    public function OptionValue()
    {
        return $this->belongsTo(OptionValue::class, 'option_value_id');
    }
}
