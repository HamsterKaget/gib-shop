<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddonProgram extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        "addon_id",
        "program_id",
    ];

    public function Addon() {
        return $this->belongsTo(Addon::class, 'addon_id', 'id');
    }

    public function Program() {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
