<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $casts = [
        'tech_stack' => 'array',
    ];

    protected $fillable = ['title', 'feature_image', 'description', 'tech_stack', 'github_url'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
