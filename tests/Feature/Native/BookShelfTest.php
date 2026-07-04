<?php

use App\NativeComponents\BookShelf;
use Native\Mobile\Testing\Native;

it('renders the book shelf route with seeded books', function () {
    Native::visit('/books')
        ->assertScreen(BookShelf::class)
        ->assertNavTitle('Book Shelf')
        ->assertSee('Designing Data-Intensive Applications')
        ->assertSee('Swipe a row to edit or delete.');
});

it('opens the edit sheet from a book and saves changes', function () {
    $screen = Native::test(BookShelf::class)
        ->call('openEdit', 'book_1')
        ->assertSet('showEditSheet', true)
        ->assertSet('editTitle', 'Designing Data-Intensive Applications')
        ->call('updateEditTitle', 'Designing Data-Intensive Apps')
        ->call('updateEditDescription', 'A tighter note for a mobile shelf demo.')
        ->call('setEditRating', 3)
        ->assertSet('editRating', 3)
        ->call('saveBook')
        ->assertSet('showEditSheet', false);

    expect($screen->get('books')[0])
        ->title->toBe('Designing Data-Intensive Apps')
        ->description->toBe('A tighter note for a mobile shelf demo.')
        ->rating->toBe(3);
});

it('deletes books through the list action handler', function () {
    $screen = Native::test(BookShelf::class)
        ->call('deleteBook', 'book_2')
        ->assertSet('lastAction', 'Deleted The Pragmatic Programmer');

    expect(array_column($screen->get('books'), 'id'))->toBe([
        'book_1',
        'book_3',
        'book_4',
    ]);
});

it('cycles a book rating and marks the animation pulse', function () {
    $screen = Native::test(BookShelf::class)
        ->call('bumpRating', 'book_2')
        ->assertSet('ratingPulse', 1)
        ->assertSet('lastAction', 'Rated The Pragmatic Programmer 5 stars')
        ->call('bumpRating', 'book_2')
        ->assertSet('ratingPulse', 2)
        ->assertSet('lastAction', 'Rated The Pragmatic Programmer 1 stars');

    expect($screen->get('books')[1])
        ->id->toBe('book_2')
        ->rating->toBe(1);
});
