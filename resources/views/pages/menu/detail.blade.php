@extends('layouts.app')

@section('content')
<div class="mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
          <li class="breadcrumb-item active" aria-current="page">Show</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex align-content-center justify-content-between">
            <h4>Detail Menu</h4>
            <a href="{{url(session('links')[1])}}" class="btn btn-warning">
                <span data-feather="arrow-left"></span> Kembali
            </a>
        </div>
        <table class="table">
            <tr>
    <th>Nama Menu</th>
    <td>{{$data->nama}}</td>
</tr>

<tr>
    <th>Gambar</th>
    <td><img src="{{asset('storage/'.$data->gambar)}}" alt=""></td>
</tr>

<tr>
    <th>Link</th>
    <td>{{$data->link}}</td>
</tr>

        </table>
    </div>
  </div>
@endsection
