<?php

namespace App\Livewire\Ui;

use App\Facades\Settings;
use App\Mail\Contact as MailContact;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Lazy;

/**
 * A lazy loading iframe, not rendered until whole page is ready
 * to ensure it loads the content at the correct size based
 * on the page layout.
 */

#[Lazy]
class IFrame extends Component
{

    /**
     * The src of the iframe
     *
     * @var string
     */
    public string $src;

    /**
     * Class
     *
     * @var string
     */
    public string $class;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(
        string $src = '',
        string $class = 'w-full h-full',
    )
    {
        $this->src = $src;
        $this->class = $class;
    }

    /**
     * Render the Project list
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.iframe');
    }
}
