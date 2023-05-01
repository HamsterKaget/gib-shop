<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_detail_id',
        'program_option_id',
        'option_value_id',
        'quantity',
    ];

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetails::class);
    }

    public function programOption()
    {
        return $this->belongsTo(ProgramOption::class);
    }

    public function optionValue()
    {
        return $this->belongsTo(ProgramOptionValue::class);
    }
}
