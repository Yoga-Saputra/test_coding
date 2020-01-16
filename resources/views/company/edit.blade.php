@extends('layouts.app')
@section('title','Company')
@section('content')
    <h1 class="p-3 text-center">Edit Data Company</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukan Nama " value="{{$company->nama}}">          
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email Anda" value="{{$company->email}}">
                </div>
                <div class="form-group">
                        <label for="logo">Logo</label>
                        <input name="logo" type="file" class="form-control" id="logo" aria-describedby="emailHelp" placeholder="Masukan Logo" value="{{$company->logo}}">
                </div>
                <div class="form-group">
                        <label for="website">Website</label>
                        <input name="website" type="text" class="form-control" id="website" aria-describedby="emailHelp" placeholder="Masukan Logo" value="{{$company->website}}">
                </div>

                <button name="submit" type="submit" class="btn btn-warning ">Update</button>
            </form>
        </div>
    </div>
@endsection