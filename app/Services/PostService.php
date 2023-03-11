<?php

namespace App\Services;

use App\Models\Post;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Posts.
 *
 */
class PostService
{
    use HasActiveStatus;

    public $model = Post::class;

    /**
     * Get recent posts
     *
     * @param int $count    How many to get
     * @return Collection
     */
    public function getRecent(int $count = 5): Collection
    {
        return $this->getBaseQuery()
            ->orderBy('created_at', 'desc')
            ->limit($count)
            ->get();
    }

}
