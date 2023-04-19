<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramOption extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "program_option";

    protected $fillable = [
        "program_id",
        "options",
    ];

    // Define Relation
    public function Program() {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function Value() {
        return $this->hasMany(ProgramOptionValue::class, 'option_id');
    }
}
