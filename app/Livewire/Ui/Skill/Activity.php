<?php

namespace App\Livewire\Ui\Skill;

use App\Enums\SkillLogType;
use App\Models\Skill;
use Livewire\Component;

class Activity extends Component
{
    /**
     * The Skill being viewed
     *
     * @var Skill
     */
    public Skill $skill;

    /**
     * Number of journeys completed in the period
     *
     * @var int
     */
    public int $journeysCompleted  = 0;

    /**
     * Number of learning logs in the period
     *
     * @var int
     */
    public int $learningLogs = 0;

    /**
     * Number of use logs in the period
     *
     * @var int
     */
    public int $useLogs = 0;

    /**
     * Number of readings in the period
     *
     * @var int
     */
    public int $readings = 0;

    /**
     * Number of demos created in the period
     *
     * @var int
     */
    public int $demos = 0;

    /**
     * Number of projects created in the period
     *
     * @var int
     */
    public int $projects = 0;

    /**
     * Number of months to show activity for
     *
     * @var int
     */
    protected int $periodInMonths = 3;

    /**
     * Mount the component and populate the activity data
     *
     * @return void
     */
    public function mount(Skill $skill): void
    {
        $this->setActivity();
    }

    /**
     * Get the activity data from the skill model
     *
     * NB! All relationships should have been loaded before the
     * skill is passed to this component.
     *
     * @return void
     */
    protected function setActivity()
    {
        $fromDate = now()->subMonths($this->periodInMonths);

        $this->journeysCompleted = $this->skill->skillJourneys
            ->where('completed_at', '!=', null)
            ->where('completed_at', '>=', $fromDate)
            ->count();

        $this->learningLogs = $this->skill->skillLogs
            ->where('type', SkillLogType::Learn)
            ->where('date', '>=', $fromDate)
            ->count();

        $this->useLogs = $this->skill->skillLogs
            ->where('type', SkillLogType::Use)
            ->where('date', '>=', $fromDate)
            ->count();

        // @todo: This is not correct, it should be the number of readings in the period
        $this->readings = $this->skill->readingsCount;

        $this->demos = $this->skill->demos
            ->where('created_at', '>=', $fromDate)
            ->count();

        $this->projects = $this->skill->projects
            ->where('created_at', '>=', $fromDate)
            ->count();
    }

    /**
     * Set the period to show activity for
     *
     * @param  int $months
     * @return void
     */
    public function setPeriod(int $months): void
    {
        $this->periodInMonths = $months;
        $this->setActivity();
    }

    /**
     * Get the period to show activity for
     *
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->periodInMonths;
    }

    /**
     * Render the component
     *
     * @return View
     */
    public function render()
    {
        return view('ui.skills.activity');
    }
}
