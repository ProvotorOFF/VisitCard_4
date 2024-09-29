<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'brand_id',
        'model',
        'price',
        'transmission_type_id',
        'vin'
    ];

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
}
