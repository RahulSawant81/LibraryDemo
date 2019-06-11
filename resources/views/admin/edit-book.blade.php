@extends('layouts.app')

@section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="/admin">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/authors">Authors</a>
                </li>
                <li>
                    <a href="/admin/categories">Book Categories</a>
                </li>
                <li>
                    <a href="/admin/books" class="active">Books</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Update Book</div>

                            <div class="card-body">
                                <form action="{{ route('update/book') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="book" value="{{ $book['id'] }}">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $book['name'] }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                                        <div class="col-md-6">
                                            <select name="author" required class="form-control">
                                                <option value="">Select Author</option>
                                                @if($authors->count())
                                                    @foreach($authors as $author)
                                                        @if($author->id == $book['author'])
                                                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                                        @else
                                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                            @endif
                                                    @endforeach
                                                @endif
                                            </select>

                                            @if ($errors->has('author'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                        <div class="col-md-6">
                                            <select name="category" required class="form-control">
                                                <option value="">Select Book Category</option>
                                                @if($cats->count())
                                                    @foreach($cats as $cat)
                                                        @if($cat->id == $book['cat'])
                                                            <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                                        @else
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endif

                                                    @endforeach
                                                @endif
                                            </select>

                                            @if ($errors->has('category'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                        <div class="col-md-6">
                                            <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $book['price'] }}" required autofocus
                                                   step="any" min="0">

                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="desc" type="text" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" autofocus>
                                                {{ $book['desc'] }}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                            <a href="{{ route('admin/books') }}" class="btn btn-danger">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection
