<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCanSeeBookPage()
    {
        $response = $this->get(route('book.index'));
        $response->assertViewIs('book.index')
            ->assertStatus(200);
    }

    public function testGuestCanSeeAllBookExist()
    {
        $books = factory(Book::class, 5)->create();

        $response = $this->get(route('book.index'))
            ->assertSuccessful();

        $response->assertSee($books[0]->name);
        $response->assertSee($books[1]->name);
        $response->assertSee($books[2]->name);
        $response->assertSee($books[3]->name);
        $response->assertSee($books[4]->name);

    }
}
