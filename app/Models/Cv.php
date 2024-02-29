<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_date',
        'issued_to_person',
        'issued_to_company',
        'name',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function getFilenameAttribute(): string
    {
        return sprintf(
            'matthew_page_php_developer_cv%d_%s.pdf',
            $this->id,
            $this->issue_date?->format('Y_m_d')
        );
    }

    public function references()
    {
        return $this->morphedByMany(Reference::class, 'cvable');
    }

    public function cvSections()
    {
        return $this->morphedByMany(CvSection::class, 'cvable')
            ->withPivot(['order', 'tag']);
    }

    public function skills(): MorphToMany
    {
        return $this->morphedByMany(Skill::class, 'cvable')
            ->withPivot(['order', 'tag']);
    }

    public function recentSkills(): MorphToMany
    {
        return $this->morphedByMany(Skill::class, 'cvable')
            ->withPivot(['order', 'tag'])
            ->wherePivot('tag', 'recent');
    }

    public function topSkills(): MorphToMany
    {
        return $this->morphedByMany(Skill::class, 'cvable')
            ->withPivot(['order', 'tag'])
            ->wherePivot('tag', 'top');
    }

    public function projects(): MorphToMany
    {
        return $this->morphedByMany(Project::class, 'cvable')
            ->withPivot(['order', 'tag']);
    }

    public function experiences(): MorphToMany
    {
        return $this->morphedByMany(Experience::class, 'cvable')
            ->withPivot(['order', 'tag'])
            ->orderBy('start', 'desc');
    }

    public function demos(): MorphToMany
    {
        return $this->morphedByMany(Demo::class, 'cvable')
            ->withPivot(['order', 'tag']);
    }

    public function books(): MorphToMany
    {
        return $this->morphedByMany(Book::class, 'cvable')
            ->withPivot(['order', 'tag']);
    }
}
