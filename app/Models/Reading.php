<?php

namespace App\Models;

use App\Interfaces\CanBeJournalEntry;
use App\Models\Traits\HasDuration;
use App\Models\Traits\IsJournable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reading extends Model implements CanBeJournalEntry
{
    use HasFactory;
    use HasDuration;
    use IsJournable;

    protected $fillable = [
        'chapter',
        'pages',
        'minutes',
        'notes',
    ];

    /**
     * The Book being read
     *
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    #[\Override]
    public static function getJournalRelations(): array
    {
        return ['book'];
    }
}
