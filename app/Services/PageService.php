<?php

namespace App\Services;

/**
 * HTML Page helper service for managing the page title,
 * description, keywords and robots tags.
 *
 * Service aliased by `Page` and can be used statically
 * anywhere including blade views.
 *
 */
class PageService
{
    /**
     * Page title seperator
     *
     * @var string
     */
    const TITLE_SEPERATOR = ' | ';

    /**
     * Page title
     *
     * @var string
     */
    protected $title = null;

    /**
     * Page description
     *
     * @var string
     */
    protected $description = null;

    /**
     * Page keywords
     *
     * @var string
     */
    protected $keywords = null;

    /**
     * Robots
     *
     * @var string
     */
    protected $robots = 'all';

    /**
     * Set the page title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Append to the page title
     *
     * @param string $title
     * @return void
     */
    public function appendTitle(string $title): void
    {
        $this->title .= self::TITLE_SEPERATOR . $title;
    }

    /**
     * Set the page description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Set the page keywords
     *
     * @param string $keywords
     * @return void
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * Set the page robots
     *
     * @param string $robots
     * @return void
     */
    public function setRobots(string $robots): void
    {
        $this->robots = $robots;
    }

    /**
     * Get the page title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title ?? config('app.name');
    }

    /**
     * Get the page description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description ?? config('app.description') ?? '';
    }

    /**
     * Get the page keywords
     *
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords ?? config('app.keywords') ?? '';
    }

    /**
     * Get the page robots
     *
     * @return string
     */
    public function getRobots(): string
    {
        return $this->robots;
    }

    /**
     * Does the page have a description ?
     *
     * @return boolean
     */
    public function hasDescription(): bool
    {
        return !empty($this->description);
    }

    /**
     * Does the page have keywords ?
     *
     * @return boolean
     */
    public function hasKeywords(): bool
    {
        return !empty($this->keywords);
    }

    /**
     * Does the page have a robots ?
     *
     * @return boolean
     */
    public function hasRobots(): bool
    {
        return !empty($this->robots);
    }

}
