<?php

namespace App\Models;

use App\Enums\SettingType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory,
};

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    /**
     * Casts
     *
     * @var array
     */
    protected $casts = [
        'type' => SettingType::class,
    ];

    /**
     * Get the Setting value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the Setting value
     *
     * @param mixed $value
     * @return void
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * Get the Setting label
     *
     * @return string
     */
    public function getLabel()
    {
        return Str::of($this->key)
            ->replace('_', ' ')
            ->title()
            ->replace('Url', 'URL for ');
    }
}
