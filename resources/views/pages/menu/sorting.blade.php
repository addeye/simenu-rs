@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
<style>
 .ui-state-highlight { width: 134px; height: 171px; padding-left: 8px; padding-right: 8px; margin-top: 16px; margin-left: 8px; margin-right: 8px; }
</style>
@endsection

@section('content')
    <div class="mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Urutan</li>
            </ol>
        </nav>
    </div>
    <form action="menu-urutan" method="POST" class="card">
        @csrf
        <div class="card-header">
            <div class="d-flex align-content-center justify-content-between">
                <h4 class="card-title">Data Menu</h4>
                <a href="/menu" class="btn btn-warning">
                    <span data-feather="arrow-left"></span> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="container text-center">
                <div id="sortable" class="row row-cols-auto g-3">
                    @foreach ($menus as $item)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('storage/'.$item->gambar)}}" class="img-fluid" style="height: 100px; width: 100px; object-fit: contain; object-position: center;" alt="">
                                <p class="m-0 py-2">{{$item->nama}}</p>
                                <input type="hidden" name="sort[]" value="{{$item->id}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <div class="d-grid gap-2 col-4 mx-auto">
                <button class="btn btn-primary" type="submit"> <span data-feather="save"></span> Simpan Perubahan</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#sortable").sortable({
                placeholder: "ui-state-highlight"
            });
            $("#sortable").disableSelection();
        });
        function deleteData(id) {
            if (confirm("Apakah anda yakin?")) {
                document.getElementById('formdelete-' + id).submit()
            }
            return false;
        }
    </script>
@endsection