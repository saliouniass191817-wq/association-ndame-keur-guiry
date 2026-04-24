<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectProposal extends Model
{
    public const STATUS_PENDING = 'en attente';
    public const STATUS_APPROVED = 'approuvee';
    public const STATUS_REJECTED = 'rejetee';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'impact',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_APPROVED);
    }
}
