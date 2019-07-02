<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Notifications\BookBorrowed;
use App\Notifications\BookReturned;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{

    public function index(){
        //
    }

    public function create(){

        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(){

        $data = $this->validateData();

        $data['publish_date'] = Carbon::parse($data['publish_date'])->format('Y-m-d');

        Book::create($data);

        return back()->with('message', 'Book created!');
    }

    public function show(Book $book){
        //
    }

    public function edit(Book $book){
        $categories = Category::all();

        $publishDate = new Carbon($book->publish_date);

        return view('books.edit', compact('book', 'categories', 'publishDate'));
    }

    public function update(Book $book){
        $data = $this->validateData();

        $data['publish_date'] = Carbon::parse($data['publish_date'])->format('Y-m-d');

        $book->update($data);

        return redirect()->route('home')->with('message', 'Book updated!');
    }

    public function updateAvailability(){
        if ("return" == request('user_id')) {
            $data = request()->validate([
                'id' => ['required', 'exists:books,id']
            ]);

            $data['user_id'] = NULL;
        }else{
            $data = request()->validate([
                'id'        => ['required', 'exists:books,id'],
                'user_id'   => ['required', 'exists:users,id'],
            ]);
        }

        $book = Book::find($data['id']);

        $book->update($data);

        //Manda un correo al usuario de que ha sacado un libro
        $book->user->notify(new BookBorrowed($book));

        return redirect()->route('home')->with('message', 'Book updated!');
    }


    public function delete(Book $book){
        if (!is_null($book->user_id))  {
            return redirect()->route('home')->with('alert', 'Book can\'t be deleted since is been borrowed');
        }

        $book->delete();

        return redirect()->route('home')->with('message', 'Book deleted');
    }

    public function validateData() {
        return request()->validate([
            'name'          => ['required', 'max:200'],
            'author'        => ['required', 'max:100'],
            'category_id'   => ['required'],
            'publish_date'  => ['required']
        ]);
    }
}
