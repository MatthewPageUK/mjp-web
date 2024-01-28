<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'availability';

    protected $primaryKey = 'date';

    public $incrementing = false;

    protected $keyType = 'date';

    protected $fillable = [
        'date',
        'am',
        'pm',
        'icon',
    ];

    protected $casts = [
        'date' => 'date',
        'am' => 'boolean',
        'pm' => 'boolean',
    ];

    /**
     * Get the date string in the format as used by Alpine in the frontend.
     *
     * @return string
     */
    public function getDateStringAttribute(): string
    {
        return $this->date->format('Y-m-d');
    }
}
