<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "program";

    protected $fillable = [
        "category_id",
        "title",
        "thumbnail",
        "description",
        "start_date",
        "end_date",
        "location",
        "time",
        "stock",
        "price",
        "eksternal_link",
        "slug",
        "created_at",
        "updated_at",
    ];

    // Define Relation
    public function Category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Image() {
        return $this->hasMany(ProgramImage::class, 'program_id');
    }

    public function Option() {
        return $this->hasMany(ProgramOption::class, 'program_id');
    }

    public function Discount() {
        return $this->hasMany(discount::class, 'program_id');
    }

    public function Order() {
        return $this->hasMany(OrderDetails::class, 'program_id');
    }


}
