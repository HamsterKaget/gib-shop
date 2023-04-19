<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramOptionValue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "option_value";

    protected $fillable = [
        "option_id",
        "value",
    ];

    // Define Relation
    public function Option() {
        return $this->belongsTo(ProgramOption::class, 'option_id');
    }
}
