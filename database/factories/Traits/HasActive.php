<?php

namespace Database\Factories\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;

trait HasActive
{
    /**
     * The model should be active
     *
     * @return
     */
    public function active(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'active' => true,
        ]);
    }

    /**
     * The model should be inactive
     *
     * @return Illuminate\Database\Eloquent\Factories\Factory
     */
    public function inactive(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'active' => false,
        ]);
    }
}