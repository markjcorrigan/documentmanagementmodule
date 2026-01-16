<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pmbokNotes(): HasMany
    {
        return $this->hasMany(PmbokNote::class);
    }

    public function getProgressAttribute(): int
    {
        // Calculate progress based on how many processes have notes
        $totalProcesses = 49; // PMBOK has 49 processes
        $notesCount = $this->pmbokNotes()->count();

        return min(100, round(($notesCount / $totalProcesses) * 100));
    }
}
