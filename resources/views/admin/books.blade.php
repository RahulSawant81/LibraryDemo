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
                        @include('flash-message')
                    </div>
                    <div class="col-md-2 offset-md-10" style="margin-bottom: 1em">
                        <a href="{{ route('book') }}" class="btn btn-info">Add Book</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @if(count($books))
                                @foreach($books as $key => $book)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $book['name'] }}</td>
                                        <td>{{ $book['author'] }}</td>
                                        <td>{{ $book['category'] }}</td>
                                        <td>{{ $book['price'] }}</td>
                                        <td>{{ $book['desc'] }}</td>
                                        <td>
                                            <a href="{{ route('edit/book', [$book['id']]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('delete/book', [$book['id']]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">Books not found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection
