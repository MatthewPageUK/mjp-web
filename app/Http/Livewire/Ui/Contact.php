<?php

namespace App\Http\Livewire\Ui;

use App\Mail\Contact as MailContact;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

class Contact extends Component
{

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
     * @var ContactMessage
     */
    public $message;

    /**
     * Form rules
     *
     * @var array
     */
    protected $rules = [
        'message.first_name' => 'required',
        'message.surname' => 'nullable',
        'message.company' => 'nullable',
        'message.telephone' => 'nullable',
        'message.email' => 'required|email',
        'message.message' => 'nullable',
    ];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        $this->message = new ContactMessage();
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
    }

    /**
     * Send the message
     *
     * @return void
     */
    public function send()
    {
        $this->validate();

        try {
            Mail::to('work@mjp.co')
                ->send(new MailContact($this->message));
        } catch (\Exception $e) {
            $this->mailError = $e->getMessage();
            return;
        }

        $this->mailError = false;
        $this->sent = true;

    }

    /**
     * Render the Project list
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.contact.form');
    }
}
