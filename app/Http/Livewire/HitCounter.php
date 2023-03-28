<?php

namespace App\Http\Livewire;

use App\Enums\HitCounterFormats;
use App\Models\HitCounter as ModelsHitCounter;
use App\Services\HitCounterService;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use ValueError;

/**
 * A hit counter component to log hits to individual pages
 * and display a counter with stats in various formats.
 *
 * Output formats:
 * - Decimal
 * - Hexadecimal
 * - Binary
 * - Roman Numerals
 *
 */
class HitCounter extends Component
{
    /**
     * The page to count hits for
     *
     * @var string
     */
    public string $page = '';

    /**
     * The number of hits recorded on the page
     *
     * @var int
     */
    public int $hits = 0;

    /**
     * The number of days since first hit
     *
     * @var int
     */
    public int $days = 0;

    /**
     * Hits per day
     *
     * @var float
     */
    public float $hitsPerDay = 0.0;

    /**
     * Format to output the counter as
     *
     * @var string
     */
    public string $format = 'dec';

    /**
     * Available formats
     *
     * @var array
     */
    public array $formats = [];

    /**
     * The HitCounter model for the current page
     *
     * @var HitCounter
     */
    protected ModelsHitCounter $hitCounter;

    /**
     * Mount the component and register the hit
     *
     */
    public function mount(HitCounterService $hitCounterService, string $page): void
    {
        $this->page = $page;

        // Register the hit and get the counter
        $this->hitCounter = $hitCounterService->hit($page);

        // Number of hits
        $this->hits = $this->hitCounter->hits;

        // Days since first hit
        $this->days = $hitCounterService->daysSinceFirstHit($this->hitCounter);

        // Hits per day
        $this->hitsPerDay = number_format($hitCounterService->hitsPerDay($this->hitCounter), 1);

        // Available formats
        $this->formats = HitCounterFormats::toArray();
    }

    /**
     * Get the formatted counter string
     *
     * @return string
     */
    public function getCounterProperty(): string
    {
        switch ($this->format) {

            case 'hex':
                return Str::of(dechex($this->hits))
                    ->upper()
                    ->padLeft(10, '0')
                    ->replaceFirst('00', '0x');

            case 'bin':
                return Str::of(decbin($this->hits))
                    ->padLeft(12, '0');

            case 'rom':
                return $this->numberToRoman($this->hits);
        }

        return Str::of($this->hits)->padLeft(10, '0');
    }

    /**
     * Set the format to display the counter in
     *
     * @param string $format
     * @return void
     */
    public function setFormat(string $format): void
    {
        try {
            $this->format = HitCounterFormats::from($format)->value;
        } catch (ValueError $e) {
            $this->format = 'dec';
        }
    }

    /**
     * Render the Hit Counter
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.hit-counter');
    }

    /**
     * Convert a number to a Roman Numeral
     *
     * @param int $number
     * @return string
     */
    private function numberToRoman(int $number) {
        $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
