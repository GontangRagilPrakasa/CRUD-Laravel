<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container text-center">
            <div class="d-inline">
                <h1 class="text-center mx-auto">Pariwisata</h1>

                <a href="/create" class="btn btn-primary">Add New</a>
            </div>

            <hr/>

            <div class="row">
                @foreach($data as $item)
                <div class='col-12 col-md-4'>
                    <div class='card mb-2'>
                        <img src='{{ $item->pariwisata_gambar }}' class='card-img-top'>
                        <div class='card-body'>
                            <h1 class='card-title'>{{ $item->pariwisata_nama }}</h1>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>

        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>
</html>