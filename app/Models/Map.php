<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'map_id',
        'name',
        'star_rating',
        'bpm',
        'length',
        'beatmapset_id',
        'artist',
        'creator',
        'difficulty_name'
    ];

    public function mapPool(): BelongsTo
    {
        return $this->belongsTo(MapPool::class);
    }
}
