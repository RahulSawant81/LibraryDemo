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
                    <a href="/admin/authors" class="active">Authors</a>
                </li>
                <li>
                    <a href="/admin/categories">Book Categories</a>
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
                        <a href="/admin/add/author" class="btn btn-info">Add Author</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Descirption</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @if($authors->count())
                                @foreach($authors as $key => $author)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->description }}</td>
                                        <td>
                                            <a href="{{ route('edit/author', [$author['id']]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('delete/author', [$author['id']]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">Authors not found</td>
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
