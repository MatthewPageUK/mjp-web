<?php

namespace App\Services\Cms;

use App\Models\Message;

/**
 * CMS - Message Service.
 *
 * Service for managing Messages in the CMS.
 * View list and delete.
 *
 */
class MessageService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = Message::class;

    /**
     * Default sort order for the list.
     *
     * @var string
     */
    protected $defaultSort = 'created_at';

    /**
     * Default sort order direction.
     *
     * @var string
     */
    protected $defaultSortDirection = 'desc';
}
