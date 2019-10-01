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

    public function testGuestCanAddNewBook()
    {
        $book = factory(Book::class)->make();

        $this->get(route('book.create.index'))
            ->assertViewIs('book.create')
            ->assertStatus(200);

        $this->post(route('book.create'), [
            '_token' => \Session::token(),
            'name' => $book->name,
            'author' => $book->author,
            'price' => $book->price,
            'describe' => $book->describe,
            'pic' => $book->pic,
            'type' => $book->type,
        ])->assertRedirect(route('book.index'));

        $m_book = new Book();
        $this->assertDatabaseHas($m_book->getTable(), [
            'name' => $book->name,
            'author' => $book->author,
            'price' => $book->price,
            'describe' => $book->describe,
            'pic' => $book->pic,
            'type' => $book->type,
        ]);
    }

    public function testGuestCanEditBook()
    {
        $book = factory(Book::class)->create();

        $bookEdit = factory(Book::class)->make();

        $this->get(route('book.edit.index', $book->id))
            ->assertViewIs('book.edit')
            ->assertSee($book->name)
            ->assertSee($book->author)
            ->assertSee($book->price)
            ->assertSee($book->describe)
            ->assertSee($book->pic)
            ->assertSee($book->type)
            ->assertStatus(200);

        $this->post(route('book.edit'), [
            '_token' => \Session::token(),
            'id' => $book->id,
            'name' => $bookEdit->name,
            'author' => $bookEdit->author,
            'price' => $bookEdit->price,
            'describe' => $bookEdit->describe,
            'pic' => $bookEdit->pic,
            'type' => $bookEdit->type,
        ])->assertRedirect(route('book.index'));

        $bookEdited = Book::find($book->id);
        $this->assertEquals($bookEdit->name, $bookEdited->name);
        $this->assertEquals($bookEdit->author, $bookEdited->author);
        $this->assertEquals($bookEdit->price, $bookEdited->price);
        $this->assertEquals($bookEdit->describe, $bookEdited->describe);
        $this->assertEquals($bookEdit->pic, $bookEdited->pic);
        $this->assertEquals($bookEdit->type, $bookEdited->type);
    }

    public function testGuestCanDeleteBook()
    {
        $book = factory(Book::class)->create();

        $this->get(route('book.delete', $book->id))
            ->assertRedirect(route('book.index'));

        $bookDelete = Book::find($book->id);
        $this->assertEmpty($bookDelete);
    }
}









