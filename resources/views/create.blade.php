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

            <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data" class="card">
                @csrf

                <div class="card-header">
                    <h1 class="card-title">Form Tambah</h1>
                </div>
                <div class="card-body">
                    <div class="form-group" id="field-pariwisata_nama">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('pariwisata_nama') is-invalid @enderror" id="pariwisata_nama" name="pariwisata_nama" placeholder="Nama Pariwisata" value="{{ old('pariwisata_nama') }}">
                        
                        @error('pariwisata_nama')
                        <div class='invalid-feedback'>{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group" id="field-pariwisata_alamat">
                        <label>Alamat</label>
                        <input type="text" class="form-control @error('pariwisata_alamat') is-invalid @enderror" id="pariwisata_alamat" name="pariwisata_alamat" placeholder="Alamat Pariwisata" value="{{ old('pariwisata_alamat') }}">
                        
                        @error('pariwisata_alamat')
                        <div class='invalid-feedback'>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="field-pariwisata_detail">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('pariwisata_detail') is-invalid @enderror" id="pariwisata_detail" name="pariwisata_detail" placeholder="Deskripsi">{{ old('pariwisata_detail') }}</textarea>
                    
                        @error('pariwisata_detail')
                        <div class='invalid-feedback'>{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form-group" id="field-pariwisata_gambar">
                        <label>Gambar</label>
                        <input type="file" id="pariwisata_gambar" name="pariwisata_gambar" class="form-control @error('pariwisata_gambar') is-invalid @enderror">
                    
                        @error('pariwisata_gambar')
                        <div class='invalid-feedback'>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            
        </div>

        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>
</html>