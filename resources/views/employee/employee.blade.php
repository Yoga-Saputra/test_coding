@extends('layouts.app')
@section('title','Company')
@section('content')
    @if(session('sukses'))
    <div class="alert alert-success alert-dismissible m-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check-circle"></i>
        {{session('sukses')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        Please check the form below for errors
    </div>
    @endif
    <div class="row">
        <div class="col-6 p-3">
            <h1>Data Employee</h1>
        </div>
    <div class="col-6 p-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right"  data-toggle="modal" data-target="#exampleModal">
                Tambah Data Employee
            </button>
    </div>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee as $row)
                    <tr class="text-center">
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->company->nama }}</td>
                        <td>
                            <form action="{{ route('employee.destroy',$row->id) }}" method="POST">
                                <a href="{{ route('employee.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Yakin mau hapus {{ $row->nama }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $employee->links() }}
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukan Data Dibawah Ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/employee') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input name="nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukan Nama Anda" >
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email Anda">
                        </div>

                        <div class="form-group">
                            <label for="company" class=" form-control-label">Company</label>
                            <select name="company" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($company as $com)
                                <option  value="{{$com->id}}">{{$com->nama}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid"><i>{{$message}}</i></span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
