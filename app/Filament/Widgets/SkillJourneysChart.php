<?php

namespace App\Filament\Widgets;

use App\Models\Skill;
use App\Models\SkillJourney;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SkillJourneysChart extends ChartWidget
{
    protected static ?string $heading = 'Completed Skill Journeys';

    protected int | string | array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = Trend::query(SkillJourney::whereNotNull('completed_at'))
            ->between(
                start: \Illuminate\Support\Carbon::parse(SkillJourney::min('created_at'))->startOfMonth(),
                end: now(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Skill Jounreys',
                    'data' => $data->map(function (TrendValue $value) use (&$total) {
                        $total += $value->aggregate;
                        return $total;
                    }),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];

    }

    protected function getFilters(): ?array
    {
        return [];
        // return
        //     Skill::whereHas('skillJourneys', fn ($query) => $query->whereNotNull('completed_at'))
        //         ->orderBy('name')
        //         ->get()
        //         ->map(fn (Skill $skill) => [
        //             $skill->id,
        //             $skill->name,
        //         ])
        //         ->toArray();
    }

    protected function getType(): string
    {
        return 'line';
    }
}
