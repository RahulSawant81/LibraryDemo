@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($books))

                @foreach($books as $book)
                    <div class="col-md-4" style="margin-bottom: 1em">
                        <div class="card">
                            <div class="card-header">{{ $book['name'] }}</div>

                            <div class="card-body">
                                <p><strong>Author : </strong> {{ $book['author'] }}</p>
                                <p><strong>Category : </strong> {{ $book['category'] }}</p>
                                <p><strong>Price : </strong> {{ $book['price'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
