<?php

namespace App\Filament\Widgets;

use App\Models\SkillLog;
use Illuminate\Support\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SkillLogsChart extends ChartWidget
{
    protected static ?string $heading = 'Skill Log Minutes';

    protected int | string | array $columnSpan = '1';

    protected static ?string $maxHeight = '300px';

    public ?string $filter = 'week';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        switch ($activeFilter) {
            case 'week':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                $label = fn (TrendValue $value) => Carbon::parse($value->date)->format('D');
                break;
            case 'month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                $label = fn (TrendValue $value) => Carbon::parse($value->date)->format('d');
                break;
            default:
                $start = Carbon::parse(SkillLog::min('date'))->startOfMonth();
                $end = Carbon::now()->endOfWeek();
                $label = fn (TrendValue $value) => $value->date;
                break;
        }

        $data = Trend::query(SkillLog::query())
            ->between(
                start: $start,
                end: $end,
            )
            ->perDay()
            ->dateColumn('date')
            ->sum('minutes');

        return [
            'datasets' => [
                [
                    'label' => 'Skill Logs',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map($label),
        ];

    }

    protected function getFilters(): ?array
    {
        return [
            'all' => 'all',
            'week' => 'This week',
            'month' => 'This month',
            'year' => 'This year',
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
