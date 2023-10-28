<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "photo",
        "status",
        "price",
    ];

    public function AddonProgram() {
        return $this->hasMany(AddonProgram::class, 'addon_id');
    }
}
