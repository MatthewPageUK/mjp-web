<?php

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

interface BitwiseEnumInterface
{
    //
}

enum Warning: int implements BitwiseEnumInterface
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

    // public function testEnumValues(): void
    // {
    //     $accepted = [];
    //     for ($x = 1; $x <= 16; $x++) {
    //         $accepted[] = 1 << $x;
    //     }
    //     foreach (self::cases() as $case) {
    //         if (! in_array($case->value, $accepted)) {
    //             throw new \InvalidArgumentException("Invalid value for enum: {$case->value} {$case->name}");
    //         }
    //     }
    // }
}

class BitwiseEnumCast implements CastsAttributes
{
    public function __construct(
        protected string $enumClass
    ) { }

    public function get($model, string $key, $value, array $attributes)
    {
        return new BitwiseEnum($this->enumClass::class, $value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value->getValue();
    }
}

class BitwiseEnum
{
    public function __construct(
        protected BitwiseEnumInterface $enumClass,
        protected int    $selected = 0
    ) { }

    public function set(BitwiseEnumInterface $choice): void
    {
        $this->validate($choice);
        $this->selected |= $choice->value;
    }

    public function unset(BitwiseEnumInterface $choice): void
    {
        $this->validate($choice);
        $this->selected &= ~$choice->value;
    }

    public function isSet(BitwiseEnumInterface $choice): bool
    {
        $this->validate($choice);
        return $this->selected & $choice->value;
    }

    protected function validate($choice): void
    {
        if (! is_a($choice, $this->enumClass)) {
            throw new \InvalidArgumentException("Invalid enum - expected {$this->enumClass}, found {get_class($choice)}");
        }
    }

    public function getChoices(): array
    {
        return array_filter($this->enumClass::cases(), function ($choice) {
            return $this->isSet($choice);
        });
    }

    public function getValue(): int
    {
        return $this->selected;
    }

}

protected $casts = [
    'warnings' => BitwiseEnumCast::class.':'.Warning::class,
]