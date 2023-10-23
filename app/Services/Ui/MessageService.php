<?php

namespace App\Services\Ui;

use App\Facades\Settings;
use App\Mail\Contact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

/**
 * Service for posting Messages in the UI.
 *
 */
class MessageService
{
    /**
     * Message posting method
     *
     * @var string
     */
    protected $postingMethod = 'db';

    /**
     * Post a message
     *
     * @param array $data   Validated message data
     */
    public function postMessage(array $data)
    {
        $message = new Message($data);

        if ($this->postingMethod == 'mail') {

            // Send email
            Mail::to(Settings::getValue('contact_email'))
                ->send(
                    new Contact($message)
                );

        } else {

            // Create DB model
            $message->save();
        }
    }

}
