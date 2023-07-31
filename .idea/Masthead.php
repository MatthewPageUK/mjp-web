<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Builder,
    Factories\HasFactory,
    Model,
    SoftDeletes
};

/**
 * Masthead model class.
 *
 * @property string $name The name to show in the masthead
 * @property string $tagline The tagline to show in the masthead
 * @property string $more_url The URL to show in the "More" button
 * @property string $url The URL to show in the iFrame
 * @property int $order The order in which to display the masthead
 * @property bool $hide_on_mobile Whether to hide the masthead on mobile
 * @method static Builder ordered() Scope a query to order by the order column
 */
class Masthead extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tagline',
        'more_url',
        'url',
        'order',
        'hide_on_mobile',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'hide_on_mobile' => 'boolean',
    ];

    /**
     * Scope a query to order by the order column.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query): Builder
    {
        return $query->orderBy('order');
    }

}
