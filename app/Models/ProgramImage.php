<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "program_image";

    protected $fillable = [
        "program_id",
        "image",
    ];

    // Define Relation
    public function Program() {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
