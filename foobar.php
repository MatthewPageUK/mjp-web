<?php

enum Warning: int
{
    case LowFuel        = 1;
    case CheckEngine    = 2;
    case TyrePressure   = 4;
    case Brakes         = 8;

    public function getData(): object
    {
        return match ($this) {
            self::LowFuel => (object)['action' => 'Refuel', 'icon' => '⛽️'],
            self::CheckEngine => (object)['action' => 'Check engine', 'icon' => '🔧'],
            self::TyrePressure => (object)['action' => 'Pump tyres', 'icon' => '🔘'],
            self::Brakes => (object)['action' => 'Replace brakes', 'icon' => '🛑'],
        };
    }
}

class BitwiseEnum
{
    protected int $warnings = 0;

    public function set(Warning $warning): void
    {
        $this->warnings |= $warning->value;
    }

    public function unset(Warning $warning): void
    {
        $this->warnings &= ~$warning->value;
    }

    public function isSet(Warning $warning): bool
    {
        return $this->warnings & $warning->value;
    }

    public function showIcons(): void
    {
        foreach ($this->getWarnings() as $warning) {
            echo $warning->getData()->icon;
        }
    }

    public function getWarnings(): array
    {
        return array_filter(Warning::cases(), function ($warning) {
            return $this->isSet($warning);
        });
    }

}

// Usage

$dashboard = new BitwiseEnum();
$dashboard->set(Warning::LowFuel);
$dashboard->set(Warning::CheckEngine);
$dashboard->set(Warning::Brakes);
$dashboard->showIcons();

// Output - ⛽️🔧🛑

$dashboard->unset(Warning::LowFuel);
$dashboard->showIcons();

// Output - 🔧🛑

var_dump($dashboard->getWarnings());

// array(2) {
//    enum(Warning::CheckEngine)
//    enum(Warning::Brakes)
// }