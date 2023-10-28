<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "certificate";

    protected $fillable = [
        "program_id",
        "user_id",
        "file",
    ];

    public function Program() {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
