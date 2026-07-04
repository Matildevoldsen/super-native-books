<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\NativeComponent;

class BookShelf extends NativeComponent
{
    /** @var array<int, array{id:string,title:string,description:string,rating:int,color:string}> */
    public array $books = [];

    public bool $showEditSheet = false;

    public ?string $editingId = null;

    public string $editTitle = '';

    public string $editDescription = '';

    public int $editRating = 4;

    public int $ratingPulse = 0;

    public string $lastAction = 'Swipe a row to edit or delete.';

    public function mount(): void
    {
        if ($this->books === []) {
            $this->books = [
                [
                    'id' => 'book_1',
                    'title' => 'Designing Data-Intensive Applications',
                    'description' => 'Storage engines, replication, distributed systems, and tradeoffs that hold up under real load.',
                    'rating' => 5,
                    'color' => '#2563EB',
                ],
                [
                    'id' => 'book_2',
                    'title' => 'The Pragmatic Programmer',
                    'description' => 'Short, sharp engineering advice about ownership, feedback loops, and keeping software malleable.',
                    'rating' => 4,
                    'color' => '#16A34A',
                ],
                [
                    'id' => 'book_3',
                    'title' => 'Refactoring UI',
                    'description' => 'A practical visual design manual for developers who want product screens to feel intentional.',
                    'rating' => 5,
                    'color' => '#DB2777',
                ],
                [
                    'id' => 'book_4',
                    'title' => 'Working Effectively with Legacy Code',
                    'description' => 'A field guide for creating seams, adding tests, and improving old systems safely.',
                    'rating' => 4,
                    'color' => '#EA580C',
                ],
            ];
        }
    }

    public function navTitle(): string
    {
        return 'Book Shelf';
    }

    public function openEdit(string $id): void
    {
        $book = $this->findBook($id);

        if ($book === null) {
            return;
        }

        $this->editingId = $id;
        $this->editTitle = $book['title'];
        $this->editDescription = $book['description'];
        $this->editRating = $book['rating'];
        $this->showEditSheet = true;
        $this->lastAction = 'Editing '.$book['title'];
    }

    public function openEditAt(int $index): void
    {
        $id = $this->books[$index]['id'] ?? null;

        if (! is_string($id)) {
            return;
        }

        $this->openEdit($id);
    }

    public function closeEdit(): void
    {
        $this->showEditSheet = false;
    }

    public function saveBook(): void
    {
        if ($this->editingId === null) {
            return;
        }

        $this->books = array_map(function (array $book): array {
            if ($book['id'] !== $this->editingId) {
                return $book;
            }

            return [
                ...$book,
                'title' => trim($this->editTitle) ?: $book['title'],
                'description' => trim($this->editDescription) ?: $book['description'],
                'rating' => $this->editRating,
            ];
        }, $this->books);

        $this->showEditSheet = false;
        $this->lastAction = 'Saved '.$this->editTitle;
    }

    public function deleteBook(string $id): void
    {
        $book = $this->findBook($id);

        $this->books = array_values(array_filter(
            $this->books,
            fn (array $candidate): bool => $candidate['id'] !== $id,
        ));

        $this->lastAction = $book ? 'Deleted '.$book['title'] : 'Deleted book';
    }

    public function deleteBookAt(int $index): void
    {
        $id = $this->books[$index]['id'] ?? null;

        if (! is_string($id)) {
            return;
        }

        $this->deleteBook($id);
    }

    public function updateEditTitle(string $value): void
    {
        $this->editTitle = $value;
    }

    public function updateEditDescription(string $value): void
    {
        $this->editDescription = $value;
    }

    public function setEditRating(int $rating): void
    {
        $this->editRating = max(1, min(5, $rating));
        $this->ratingPulse++;
    }

    public function bumpRating(string $id): void
    {
        $this->books = array_map(function (array $book) use ($id): array {
            if ($book['id'] !== $id) {
                return $book;
            }

            $book['rating'] = $book['rating'] === 5 ? 1 : $book['rating'] + 1;
            $this->lastAction = 'Rated '.$book['title'].' '.$book['rating'].' stars';

            return $book;
        }, $this->books);

        $this->ratingPulse++;
    }

    public function bumpRatingAt(int $index): void
    {
        $id = $this->books[$index]['id'] ?? null;

        if (! is_string($id)) {
            return;
        }

        $this->bumpRating($id);
    }

    public function render(): Element
    {
        return $this->view('book-shelf');
    }

    /**
     * @return array{id:string,title:string,description:string,rating:int,color:string}|null
     */
    private function findBook(string $id): ?array
    {
        foreach ($this->books as $book) {
            if ($book['id'] === $id) {
                return $book;
            }
        }

        return null;
    }
}
