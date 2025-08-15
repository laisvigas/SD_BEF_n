<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::with('user')->latest()->get();
        return view('books.books_index', compact('books'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get(['id','name','email']);
        return view('books.books_create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => ['required','string','max:255'],
            'estimated_price' => ['required','numeric','min:0'],
            'paid_price'      => ['nullable','numeric','min:0'],
            'user_id'         => ['required', Rule::exists('users','id')],
        ]);

        Book::create($data);
        return redirect()->route('books_route')->with('success','Livro criado com sucesso!');
    }

    public function edit(Book $book)
    {
        $users = User::orderBy('name')->get(['id','name','email']);
        return view('books.books_edit', compact('book','users'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name'            => ['required','string','max:255'],
            'estimated_price' => ['required','numeric','min:0'],
            'paid_price'      => ['nullable','numeric','min:0'],
            'user_id'         => ['required', Rule::exists('users','id')],
        ]);

        $book->update($data);
        return redirect()->route('books_route')->with('success','Livro atualizado!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books_route')->with('success','Livro removido!');
    }

    public function show(Book $book)
    {
        return view('books.books_show', compact('book'));
    }
}
