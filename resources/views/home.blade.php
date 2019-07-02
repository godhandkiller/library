@extends('layouts/dashboard')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @if(session()->has('message') || session()->has('alert'))
            <div class="alert alert-top {{ session()->has('message')? 'alert-success': 'alert-danger'}}">
                {{ session()->has('message')? session()->get('message') :  session()->get('alert')}}
            </div>
        @endif
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Books</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('book.create') }}" class="btn btn-success">New Book</a>
            </div>
        </div>
        <div class="filters container-fluid mb-5 ">
            <form method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Availability</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="avail" >
                                    <option value="">Select an option...</option>
                                    <option value="0">Not available</option>
                                    <option value="1">Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category">
                                    <option value="">Select an option...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="auth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-sm-4 col-form-label">Publish date</label>
                            <div class="col-sm-8 my-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="order" value="asc">
                                    <label class="form-check-label" for="asc">Asc</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="order" value="desc">
                                    <label class="form-check-label" for="desc">Desc</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row float-right">
                    <div class="col-sm-12">
                        <a href="{{ route('home') }}" class="btn btn-dark">Reset</a>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Available</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Publish Date</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $key => $book)
                        <tr>
                            <td class="text-center">
                                @if (isset($book->user->name))
                                    <i class="fa fa-times" aria-hidden="true" data-toggle="tooltip" title="Borrowed by {{ $book->user->name }}"></i>
                                @else
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ Carbon\Carbon::parse($book->publish_date)->format('d/m/Y') }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary small" href="{{ route('book.edit', $book->id) }}" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-warning small availability" data-id="{{ $book->id }}">
                                    <i class="fa fa-exclamation"></i>
                                </button>
                                <a class="btn btn-danger small" href="{{ route('book.delete', $book->id) }}" data-toggle="tooltip" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </main>

    <!-- Availability modal -->
    <div class="modal fade" id="availability" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('book.update.availability') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" >Update book availability</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="numer" name="id" val="" readonly hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-12 col-form-label">Select who is going to borrow the book</label>
                                </div>
                                <div class="form-group row">
                                    <label for="author" class="col-sm-2 col-form-label">User</label>
                                    <div class="col-sm-10">
                                        <select class="form-control users-select" name="user_id">
                                            <option value="">Select an option...</option>
                                            <option value="return"><strong>Returning a book</strong></option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
