<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
};

class BulletPoint extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Colour custom attribute.
     *
     * @var string
     */
    public $colour = 'bg-gray-400';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    public function getColour(): string
    {
        return $this->colour;
    }
}
