<?php

namespace App\Filament\Widgets;

use App\Models\SkillLog;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Tables\Filters\Filter;
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
                $previsouStart = $start->copy()->subWeek();
                $previsousEnd = $end->copy()->subWeek();
                $label = fn (TrendValue $value) => Carbon::parse($value->date)->format('D');
                break;
            case 'month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                $previsouStart = $start->copy()->subMonth();
                $previsousEnd = $end->copy()->subMonth();
                $label = fn (TrendValue $value) => Carbon::parse($value->date)->format('d');
                break;
            default:
                //$start = Carbon::parse(SkillLog::min('date'))->startOfMonth();
                $start = Carbon::now()->subYear();
                $end = Carbon::now()->endOfWeek();
                $previsouStart = $start->copy()->subYear();
                $previsousEnd = $end->copy()->subYear();
                $label = fn (TrendValue $value) => Carbon::parse($value->date)->format('M');
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

        $previousData = Trend::query(SkillLog::query())
            ->between(
                start: $previsouStart,
                end: $previsousEnd,
            )
            ->perDay()
            ->dateColumn('date')
            ->sum('minutes');

            if ($activeFilter === 'year') {
                $data = Trend::query(SkillLog::query())
                    ->between(
                        start: $start,
                        end: $end,
                    )
                    ->perMonth()
                    ->dateColumn('date')
                    ->sum('minutes');

                $previousData = Trend::query(SkillLog::query())
                    ->between(
                        start: $previsouStart,
                        end: $previsousEnd,
                    )
                    ->perMonth()
                    ->dateColumn('date')
                    ->sum('minutes');
            }


        return [
            'datasets' => [
                [
                    'label' => 'This period',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Last period',
                    'data' => $previousData->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#333333',
                ],
            ],
            'labels' => $data->map($label),
        ];

    }

    protected function getFilters(): ?array
    {
        return [
            // 'all' => 'all',
            'week' => 'This week',
            'month' => 'This month',
            'quarter' => 'This quarter',
            'year' => 'This year',
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
