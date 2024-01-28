<?php

namespace App\Livewire\Ui\Availability;

use App\Models\Availability;
use App\Services\Ui\MessageService;
use App\View\Components\UiLayout;
use Carbon\Carbon;
use Illuminate\Support\Facades\{
    Auth,
    Log
};
use Livewire\{
    Attributes\Validate,
    Component,
};

class Index extends Component
{
    /**
     * Is the current user an admin?
     *
     * @var bool
     */
    public bool $userIsAdmin = false;

    /**
     * Quote request name
     *
     * @var string
     */
    #[Validate('required|min:3', as: 'name')]
    public string $messageName = '';

    /**
     * Quote request email
     *
     * @var string
     */
    #[Validate('required|email', as: 'email')]
    public string $messageEmail = '';

    /**
     * Quote request content
     *
     * @var string
     */
    #[Validate('required|min:3', as: 'message')]
    public string $messageContent = '';

    /**
     * Quote request sent status
     *
     * @var bool
     */
    public bool $sent = false;

    /**
     * Quote request sending error
     *
     * @var bool
     */
    public bool $mailError = false;

    /**
     * Number of months to show in the calenadr
     *
     * @var int
     */
    protected int $totalMonthsToShow = 12;

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount()
    {
        $this->userIsAdmin = Auth::user()?->isAdmin() ?? false;
    }

    /**
     * Get the months array to show on the page.
     * [
     *    'January' => Carbon,
     *    'February' => Carbon,
     *    ...
     * ]
     *
     * @return array
     */
    public function getMonthsProperty()
    {
        $months = [];
        for ($i = 0; $i < $this->totalMonthsToShow; $i++) {
            $month = $this->startOfCalendar->copy()->addMonths($i);
            $months[$month->format('F')] = $month;
        }

        return $months;
    }

    /**
     * Get the start of the calendar date.
     *
     * @return Carbon
     */
    public function getStartOfCalendarProperty()
    {
        return Carbon::now()->startOfMonth();
    }

    /**
     * Get the end of the calendar date.
     *
     * @return Carbon
     */
    public function getEndOfCalendarProperty()
    {
        return $this->startOfCalendar->copy()->addMonths($this->totalMonthsToShow)->endOfMonth();
    }

    /**
     * Get all the days in the current calendar.
     *
     * @return array
     */
    public function getDaysProperty()
    {
        return Availability::whereBetween('date', [
                $this->startOfCalendar,
                $this->endOfCalendar
            ])
            ->orderBy('date')
            ->get();
    }

    /**
     * Toggle the availability of a period in the day
     *
     * @param string $day
     * @param string $period
     */
    public function toggleAvailability(string $day, string $period)
    {
        /**
         * Only admins can toggle availability, abort if the user is not an admin.
         */
        if (! $this->userIsAdmin) {
            abort(403);
        }

        /**
         * Make sure the period is either am or pm, this value is passed from the frontend
         * and is used as a dyanmic property on the model. Be sure it is only am or pm.
         */
        $period = $period === 'am' ? 'am' : 'pm';

        /**
         * Get the Availability model for the given day.
         */
        $availabilityForDay = Availability::where('date', $day)->first();

        /**
         * Toggle the boolean 'period' property on the model.
         */
        $availabilityForDay->update([
            $period => ! $availabilityForDay->{$period},
        ]);
    }

    /**
     * Send the quote request
     *
     * @param MessageService $messageService
     * @param array $days
     */
    public function sendQuoteRequest(MessageService $messageService, $days)
    {
        $this->mailError = false;
        $this->sent = false;

        /**
         * Validate the form data
         */
        $this->validate();

        /**
         * Build the message array
         */
        $message = [
            'first_name' => $this->messageName,
            'surname' => '',
            'company' => '',
            'telephone' => '',
            'email' => $this->messageEmail,
            'message' => $this->messageContent . '\n\n' . collect($days)->implode('\n')
        ];

        /**
         * Attempt to send the message via the MessageService
         */
        try {
            $messageService->postMessage($message);

        } catch (\Exception $e) {
            $this->mailError = $e->getMessage();
            Log::error($e->getMessage());

            return;
        }

        $this->sent = true;
        $this->messageContent = '';
    }


    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ui.availability.index')
            ->layout(UiLayout::class);
    }
}
