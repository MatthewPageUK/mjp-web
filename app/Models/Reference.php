<?php

namespace App\Models;

use App\Models\Traits\HasCvs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasCvs;
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'company',
        'email',
        'phone',
        'notes',
    ];
}
