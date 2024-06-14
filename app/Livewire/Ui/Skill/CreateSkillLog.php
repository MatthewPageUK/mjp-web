<?php

namespace App\Livewire\Ui\Skill;

use App\Enums\SkillLogLevel;
use App\Enums\SkillLogType;
use App\Models\Skill;
use App\Models\SkillLog;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Notifications\Notification;
use Livewire\Component;

class CreateSkillLog extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public string $skill;

    public function mount($skill): void
    {
        // Auth
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $skill = Skill::where('slug', $this->skill)->first();

        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->default(now())
                    ->columnSpan(2),
                Forms\Components\Select::make('type')
                    ->options(SkillLogType::class)
                    ->default(SkillLogType::Use)
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Select::make('level')
                    ->options(SkillLogLevel::class)
                    ->default(SkillLogLevel::Intermediate)
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Select::make('minutes')
                    ->options(['30' => '1/2 hour', '60' => '1 hour', '120' => '2 hours', '180' => '3 hours', '240' => '4 hours', '300' => '5 hours'])
                    ->default('60')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Select::make('skills')
                    ->relationship('skills', 'name')
                    ->multiple()
                    ->preload()
                    ->default([$skill->id])
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('notes')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])
            ->columns(4)
            ->statePath('data')
            ->model(SkillLog::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        // Validate the data?

        $log = SkillLog::create($data);

        $this->form->model($log)->saveRelationships();
        $this->form->fill();

        Notification::make()
            ->title('Skill Use Logged')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('ui.skills.create-skill-log');
    }
}
