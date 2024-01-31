<?php

namespace App\Services\Ui;

use App\Models\Book;
use App\Models\Reading;
use Flowframe\Trend\Trend;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Service for retrieving the book and reading data for the UI.
 *
 */
class LibraryService
{
    /**
     * Get all the books.
     *
     * @return Collection
     */
    public function getAllBooks()
    {
        return Book::with(['readings', 'image'])->orderBy('name')->get();
    }

    /**
     * Get unfinished books.
     *
     * @return Collection
     */
    public function getUnfinishedBooks()
    {
        return Book::with(['readings', 'image'])->unfinished()->orderBy('name')->get();
    }

    /**
     * Get unread books.
     *
     * @return Collection
     */
    public function getUnreadBooks()
    {
        return Book::with(['readings', 'image'])->unread()->orderBy('name')->get();
    }

    /**
     * Get recently read books.
     *
     * @return Collection
     */
    public function getRecentlyReadBooks()
    {
        return(Book::with(['readings', 'image'])->whereHas('readings', function (Builder $query) {
            $query->orderBy('created_at', 'desc')->limit(1);
        })->get());
    }

    /**
     * Get recent readings
     *
     * @param int $count
     * @return Collection
     */
    public function getRecentReadings(int $count = 8)
    {
        return Reading::with(['book', 'book.image'])->whereHas('book')->orderBy('created_at', 'desc')->limit($count)->get();
    }

    /**
     * Get total reading minutes this month
     *
     * @return int
     */
    public function getTotalReadingMinutesThisMonth()
    {
        return Trend::model(Reading::class)->between(
                now()->startOfMonth(),
                now()->endOfMonth()
            )
            ->perMonth()
            ->sum('minutes')
            ->first()
            ->aggregate;
    }

    /**
     * Get total reading minutes last month
     *
     * @return int
     */
    public function getTotalReadingMinutesLastMonth()
    {
        return Trend::model(Reading::class)->between(
                now()->subMonth(1)->startOfMonth(),
                now()->subMonth(1)->endOfMonth()
            )
            ->perMonth()
            ->sum('minutes')
            ->first()
            ->aggregate;
    }
}
