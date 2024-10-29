<?php

namespace App\Models;

use App\enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
        'vin',
        'status_id'
    ];

    protected $casts = [
        'status_id' => Status::class
    ];

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): MorphMany {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getRemovableAttribue(): bool {
        return $this->status != Status::ACTIVE;
    }

    public function scopeOfActive(Builder $query): Builder {
        return $query->where('status', Status::ACTIVE);
    }

}
