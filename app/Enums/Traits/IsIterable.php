<?php

namespace App\Enums\Traits;

trait IsIterable
{
    public function next(bool $loop = true): self
    {
        return $this->move(1, $loop);
    }

    public function prev(bool $loop = true): self
    {
        return $this->move(-1, $loop);
    }

    public static function first(): self
    {
        return static::cases()[0];
    }

    public static function last(): self
    {
        return static::cases()[array_key_last(static::cases())];
    }

    protected function key(): int
    {
        return array_search($this, static::cases(), true);
    }

    protected function move(int $steps = 1, bool $loop = true): self
    {
        return static::cases()[$this->key() + $steps] ??
            ( $loop ? ( $steps >= 0 ? static::first() : static::last() ) : $this );
    }
}
