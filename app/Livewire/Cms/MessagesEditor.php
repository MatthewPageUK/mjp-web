<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\Messages;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CMS - Messages Editor component
 *
 */

class MessagesEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Message";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = Messages::class;

    /**
     * All messages
     *
     * @var array|Collection
     */
    public $messages = [];

    /**
     * Mount the component and populate the data
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->setMessages();
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->setMessages();
    }

    /**
     * Set the messages
     *
     * @return void
     */
    public function setMessages()
    {
        $this->messages = Messages::getAll();
    }

    /**
     * Render the Messages page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.messages.index')
            ->layout(CmsLayout::class, ['title' => 'CMS - Messages']);
    }
}
