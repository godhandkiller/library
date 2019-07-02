<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $books = $this->filters(new Book);

        $categories = Category::all();

        $users = User::all();

        return view('home', compact('books', 'users', 'categories'));
    }

    public function filters($books) {
        if (request()->has('avail') && 0 == request('avail') && !is_null(request('avail'))) {
            $books = $books->whereNotNull('user_id');
        }elseif (request()->has('avail') && 1 == request('avail') && !is_null(request('avail')) ) {
            $books = $books->whereNull('user_id');
        }

        if (request()->has('category') && !is_null(request('category'))) {
            $books = $books->where('category_id', request('category'));
        }

        if (request()->has('auth') && !is_null(request('auth'))) {
            $books = $books->where('author', 'LIKE', '%%' . request('auth') . '%%');
        }

        if (request()->has('order') && !is_null(request('order'))) {
            $books = $books->orderBy('publish_date', request('order'));
        }

        $books = $books->with('category')->paginate(10)->appends([
            'avail'         => request('avail'),
            'category'      => request('category'),
            'publish_date'  => request('order')
        ]);

        return $books;
    }
}
