@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/setting">Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-content-center justify-content-between">
                <h4>Tambah Setting</h4>
                <a href="{{ url(session('links')[1]) }}" class="btn btn-warning">
                    <span data-feather="arrow-left"></span> Kembali
                </a>
            </div>
            <form method="POST" class="" action="/setting" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror" id="inputnama" aria-describedby="namaHelp">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputIntro" class="form-label">Intro</label>
                    <textarea name="intro" id="inputintro" class="form-control @error('intro') is-invalid @enderror"
                        aria-describedby="introHelp">{{ old('intro') }}</textarea>
                    @error('intro')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputFooter" class="form-label">Footer</label>
                    <textarea name="footer" id="inputfooter" class="form-control @error('footer') is-invalid @enderror"
                        aria-describedby="footerHelp">{{ old('footer') }}</textarea>
                    @error('footer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputLogo" class="form-label">Logo</label>
                    <input type="file" name="logo" value="{{ old('logo') }}"
                        class="form-control @error('logo') is-invalid @enderror" id="inputlogo" aria-describedby="logoHelp"
                        accept="image/*">
                    @error('logo')
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
