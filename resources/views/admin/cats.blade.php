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
                    <a href="/admin/categories" class="active">Book Categories</a>
                </li>
                <li>
                    <a href="/admin/books">Books</a>
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
                        <a href="{{ route('category') }}" class="btn btn-info">Add Category</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @if($cats->count())
                                @foreach($cats as $key => $cat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                            <a href="{{ route('edit/book-cat', [$cat['id']]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('delete/book-cat', [$cat['id']]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">Categories not found</td>
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
