<?php

namespace App\Interfaces;

interface RouteableModel
{
    /**
     * Get the route URL for the model
     *
     * @return string
     */
    public function getRouteUrlAttribute(): string;
}