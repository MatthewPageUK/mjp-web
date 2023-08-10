<?php

namespace App\Services\Ui;

use App\Models\Post;
use App\Models\PostCategory;
use App\Services\Traits\HasActiveStatus;
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
     * Get recent Posts
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

    /**
     * Get all Posts
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Post::orderBy('name')->get();
    }

    /**
     * Get post categories with a post
     *
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return PostCategory::has('posts')->get();
    }

    public function getFiltered(array $filters)
    {
        return $this->getFilteredQuery($filters)->get();
    }

    /**
     * Get filtered Posts
     *
     * @param array $filters    Array of filters
     *                          [
     *                              'skill' => string
     *                          ]
     * @return Collection
     */
    public function getFilteredQuery(array $filters): Builder
    {
        // Base query
        $query = $this->getBaseQuery();

        // Skill filter
        if (isset($filters['skill']) && $filters['skill']) {
            $query->whereHas('skills', function (Builder $query) use ($filters) {
                $query->where('slug', $filters['skill']);
            });
        }

        // Category filter
        if (isset($filters['category']) && $filters['category']) {
            $query->whereHas('postCategories', function (Builder $query) use ($filters) {
                $query->where('slug', $filters['category']);
            });
        }

        // Search filter
        if (isset($filters['search']) && $filters['search']) {
            $query->where(function (Builder $query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('content', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Order
        $query->orderBy('created_at', 'desc');

        return $query;
    }

}
