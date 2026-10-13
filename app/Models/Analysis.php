<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Analysis extends Model
{
    protected $fillable = [
        'resume_id', 'job_description', 'ats_score', 'keyword_gaps', 'ai_suggestions', 'status',
    ];

    protected $casts = [
        'keyword_gaps' => 'array',
        'ai_suggestions' => 'array',
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
