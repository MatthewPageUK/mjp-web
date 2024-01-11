<?php

namespace App\Services\Ui;

use App\Models\Post;
use App\Models\PostCategory;
use App\Services\Traits\HasActiveStatus;
use App\Services\Traits\HasFilteredQuery;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection,
};

/**
 * Service for managing Posts.
 *
 */
class PostService
{
    use HasActiveStatus;
    use HasFilteredQuery;

    public $model = Post::class;

    /**
     * Get a single post by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return BulletPoint
     */
    public function get(int $id): Post
    {
        return Post::findOrFail($id);
    }

    /**
     * Get recent Posts from optional category
     *
     * @param int $count    How many to get
     * @return Collection
     */
    public function getRecent(int $count = 5, ?string $category = null): Collection
    {
        $filters = [];

        if ($category) {
            $filters = [
                'postCategory' => $category,
            ];
        }

        return $this->getFilteredQuery($filters)
            ->with(['skills', 'image'])
            ->latest()
            ->limit($count)
            ->get();
    }

    /**
     * Get all Posts
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getBaseQuery()
            ->with(['skills', 'image'])
            ->latest()
            ->get();
    }

    /**
     * Get post categories with a post
     *
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return PostCategory::whereHas('posts', function (Builder $query) {
            $query->active();
        })->orderBy('name')->get();
    }


    /**
     * Get filtered list of posts
     *
     * @param array $filters
     * @return Collection
     */
    public function getFiltered(array $filters)
    {
        return $this->getFilteredQuery($filters)
            ->with(['skills', 'image'])
            ->latest()
            ->get();
    }

}
