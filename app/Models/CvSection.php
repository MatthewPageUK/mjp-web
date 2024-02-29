<?php

namespace App\Models;

use App\Enums\CvSectionType;
use App\Models\Traits\HasCvs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvSection extends Model
{
    use HasCvs;
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'heading',
        'sub_heading',
        'content',
    ];

    protected $casts = [
        'type' => CvSectionType::class,
    ];

}
