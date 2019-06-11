<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Library</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="/" class="navbar-brand">
            <img src="images/logo.png" height="50" alt="CoolBrand">
            Library
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            {{--<div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">Home</a>
                <a href="#" class="nav-item nav-link">Profile</a>
                <a href="#" class="nav-item nav-link">Messages</a>
                <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a>
            </div>--}}
            <div class="navbar-nav ml-auto">
                <a href="login" class="nav-item nav-link">Login</a>
                <a href="register" class="nav-item nav-link">Register</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form id="search-form" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="key" placeholder="Search Books" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row" style="margin-top:2em;">
        <div class="col-md-12">
            <div id="books-cntnr" class="row">
            </div>
            <div id="nav-cntnr" class="row" style="margin-top:2em;">
                <div class="col-md-2 offset-md-10">
                    <a id="prev" href="" class="" ><< Previous</a>
                    &nbsp;&nbsp;&nbsp;
                    <a id="next" href="" class="" >Next >></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none">
    <span id="base-url">{{ env('APP_URL') }}</span>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>

    function getBooks(url){
        $.ajax({
            url: url,
            type: 'get',
            async: true,
            success: function(response){
                if(response.books.length){

                    $('#books-cntnr').html('');

                    $.each(response.books, function(i, book){

                        var str = '<div class="col-md-4">\n' +
                            '                        <div class="card">\n' +
                            '                            <div class="card-header">'+book.name+'</div>\n' +
                            '\n' +
                            '                            <div class="card-body">\n' +
                            '                                <p><strong>Author : </strong> '+book.author+'</p>\n' +
                            '                                <p><strong>Category : </strong> '+book.category+'</p>\n' +
                            '                                <p><strong>Price : </strong> '+book.price+'</p>\n' +
                            '                            </div>\n' +
                            '                        </div>\n' +
                            '                    </div>';

                        $('#books-cntnr').append(str);
                    });

                    if(response.items.current_page == 1){
                        //first page disable prev link
                        $('#prev').attr('disabled', true).attr('href', '');
                    } else {
                        $('#prev').attr('disabled', false).attr('href', response.items.prev_page_url);
                    }

                    if(response.items.current_page === response.items.last_page){
                        //last page disable next link
                        $('#next').attr('disabled', true).attr('href', '');
                    } else {
                        $('#next').attr('disabled', false).attr('href', response.items.next_page_url);
                    }
                }
            },
            error: function(e){
                console.log(e)
            }
        });
    }

    window.onload = function(){

        var url = $('#base-url').text();

        getBooks(url + '/get/books');

        $(document).on('click', '#prev', function(e){
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();

            var url = $(this).attr('href');

            if(url !== ''){
                getBooks(url);
            }

        });

        $(document).on('click', '#next', function(e){
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();

            var url = $(this).attr('href');

            if(url !== ''){
                getBooks(url);
            }
        });


        $('#search-form').on('submit', function(e){
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();

            var data = new FormData($(this)[0]),
                search_key = $('input[name="key"]').val();

            if(search_key !== ''){

                $.ajax({
                    url: '/search/books?key='+search_key,
                    type: 'get',
                    async: true,
                    success: function(response){
                        if(response.books.length){

                            $('#books-cntnr').html('');

                            $.each(response.books, function(i, book){

                                var str = '<div class="col-md-4">\n' +
                                    '                        <div class="card">\n' +
                                    '                            <div class="card-header">'+book.name+'</div>\n' +
                                    '\n' +
                                    '                            <div class="card-body">\n' +
                                    '                                <p><strong>Author : </strong> '+book.author+'</p>\n' +
                                    '                                <p><strong>Category : </strong> '+book.category+'</p>\n' +
                                    '                                <p><strong>Price : </strong> '+book.price+'</p>\n' +
                                    '                            </div>\n' +
                                    '                        </div>\n' +
                                    '                    </div>';

                                $('#books-cntnr').append(str);
                            });

                            if(response.items.current_page == 1){
                                //first page disable prev link
                                $('#prev').attr('disabled', true).attr('href', '');
                            } else {
                                $('#prev').attr('disabled', false).attr('href', response.items.prev_page_url);
                            }

                            if(response.items.current_page === response.items.last_page){
                                //last page disable next link
                                $('#next').attr('disabled', true).attr('href', '');
                            } else {
                                $('#next').attr('disabled', false).attr('href', response.items.next_page_url);
                            }
                        }
                    },
                    error: function(e){
                        console.log(e)
                    }
                });
            } else {
                window.location.href = '/';
            }


        });


    };
</script>
</body>

</html>
