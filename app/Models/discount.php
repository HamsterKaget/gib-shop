<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    use HasFactory;

    protected $table = 'discount';

    protected $fillable = [
        'progam_id',
        'discount',
        'percent',
        'stock',
    ];

    public function program() {
        return $this->belongsTo(Program::class, 'program_id');
    }


}
