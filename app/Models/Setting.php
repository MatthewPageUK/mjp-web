<?php

namespace App\Models;

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
    ];
}
