@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-content-center justify-content-between">
                <h4>Ubah Menu</h4>
                <a href="{{ url(session('links')[1]) }}" class="btn btn-warning">
                    <span data-feather="arrow-left"></span> Kembali
                </a>
            </div>
            <form method="POST" class="" action="/menu/{{ $data->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama Menu</label>
                    <input type="text" name="nama" value="{{ $data->nama }}"
                        class="form-control @error('nama') is-invalid @enderror" id="inputnama" aria-describedby="namaHelp">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputGambar" class="form-label">Gambar</label>
                    <br>
                    <img src="{{ asset('storage/' . $data->gambar) }}" width="100" alt="">
                    <input type="file" name="gambar" value="{{ $data->gambar }}"
                        class="form-control @error('gambar') is-invalid @enderror" id="inputgambar"
                        aria-describedby="gambarHelp" accept="image/*">
                    <p>kosongi jika tidak dirubah</p>
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputLink" class="form-label">Link</label>
                    <input type="text" name="link" value="{{ $data->link }}"
                        class="form-control @error('link') is-invalid @enderror" id="inputlink" aria-describedby="linkHelp">
                    @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
