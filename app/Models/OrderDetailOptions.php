<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetailOptions extends Model
{
    use HasFactory;
    use SoftDeletes;

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
