@extends('layouts.app')

@section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="/admin" class="active">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/authors">Authors</a>
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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">Authors</div>

                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    {{ $authors_count }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">Book  Categories</div>

                            <div class="card-body">
                                    <div class="alert alert-danger" role="alert">
                                        {{ $cats_count }}
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">Books</div>

                            <div class="card-body">
                                <div class="alert alert-info" role="alert">
                                    {{ $books_count }}
                                </div>
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
