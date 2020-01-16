@extends('layouts.app')
@section('title','Employee')
@section('content')
    <h1 class="p-3 text-center">Edit Data Company</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('employee.update',$employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukan Nama " value="{{$employee->nama}}">          
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email Anda" value="{{$employee->email}}">
                </div>

                <div class="form-group">
                    <label for="company">Company</label>
                    <select class="form-control" name="company" id="company">
                        @foreach ($company as $row)
                            <option value="{{ $row->id }}" @if ( $row->id == old('company_id',$employee->company_id ))selected @endif> 
                                {{$row->nama}}  
                            </option>
                        @endforeach
                    </select>     
                </div>

                <button name="submit" type="submit" class="btn btn-warning ">Update</button>
            </form>
        </div>
    </div>
@endsection