<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view(
            'book.index',
            compact('books')
        );
    }

    public function createIndex()
    {
        return view('book.create');
    }

    public function create(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->describe = $request->describe;
        $book->pic = $request->pic;
        $book->type = $request->type;

        if (!$book->save()) {
            return redirect()->route('book.create.index');
        }
        return redirect()->route('book.index');
    }

//    public function editIndex($id)
//    {
//        $book = Book::find($id);
//        return view('book.edit', compact('book'));
//    }

    public function editIndex(Book $id)
    {
        return view('book.edit', ['book' => $id]);
    }

    public function edit(Request $request)
    {
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->describe = $request->describe;
        $book->pic = $request->pic;
        $book->type = $request->type;

        $book->save();
        return redirect()->route('book.index');
    }

    public function delete(Book $id)
    {
        $id->delete();
        return redirect()->route('book.index');
    }




}
