<?php

namespace App\Contracts;

/**
 * Homepage Feature Contract.
 */
interface Homepage
{
    /**
     * Get the name of the homepage.
     *
     * @param  string $default
     * @return string
     */
    public function getName(string $default = ''): string;

    /**
     * Set the title of the homepage.
     *
     * @param  string $value
     * @return void
     */
    public function setName(string $value): void;

    /**
     * Get the tagline of the homepage.
     *
     * @param  string $default
     * @return string
     */
    public function getTagline(string $default = ''): string;

    /**
     * Set the tagline of the homepage.
     *
     * @param  string $value
     * @return void
     */
    public function setTagline(string $value): void;

    /**
     * Get the introduction of the homepage.
     *
     * @param  string $default
     * @return string
     */
    public function getIntroduction(string $default = ''): string;

    /**
     * Set the introduction of the homepage.
     *
     * @param  string $value
     * @return void
     */
    public function setIntroduction(string $value): void;
}