@extends('layouts.dashboard')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @if(session()->has('message'))
            <div class="alert alert-top alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">New book</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <form action="{{ route('book.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="author" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                                <option value="">Select an option...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="publish-date" class="col-sm-2 col-form-label">Publish Date</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control datepicker" name="publish_date" data-provide="datepicker" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row float-right">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
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
    </main>

@stop