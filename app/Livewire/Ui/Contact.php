<?php

namespace App\Livewire\Ui;

use App\Services\Ui\MessageService;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Homepage contact form
 *
 */
class Contact extends Component
{
    /**
     * Message service
     *
     * @var MessageService
     */
    protected MessageService $messageService;

    /**
     * Sent status
     *
     * @var bool
     */
    public $sent = false;

    /**
     * Error message
     *
     * @var string
     */
    public $mailError = false;

    /**
     * Form data
     *
     * @var array
     */
    public $message = [];

    /**
     * Form rules
     *
     * @var array
     */
    protected $rules = [
        'message.first_name'    => 'required',
        'message.surname'       => 'nullable',
        'message.company'       => 'nullable',
        'message.telephone'     => 'nullable',
        'message.email'         => 'required|email',
        'message.message'       => 'required',
    ];

    /**
     * Boot the component
     *
     * @param MessageService $messageService
     * @return void
     */
    public function boot(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Updated a property - strip tags from it
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function updated($name, $value)
    {
        $this->{$name} = strip_tags($value);
        $this->validateOnly($name);
    }

    /**
     * Validate and send the message
     *
     * @return void
     */
    public function send()
    {
        $this->validate();

        try {
            $this->messageService->postMessage($this->message);

        } catch (\Exception $e) {
            $this->mailError = $e->getMessage();
            return;
        }

        $this->mailError = false;
        $this->sent = true;
    }

    /**
     * Render the contact form
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.contact.form');
    }
}
