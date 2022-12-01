@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>

<form method="post" action="/teacher/create">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(isset($error))
                <div class="alert alert-danger">{{$error}}</div>
            @endif
            <div class="mb-3">
                <label for="nipInput" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nipInput" placeholder="NIP" name="nip" value="{{old('nip')}}">
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Nama Guru" name="name" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="study_nameInput" class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" id="study_nameInput" placeholder="Mata Pelajaran" name="study_name" value="{{old('study_name')}}">
            </div>
            <div class="mb-3">
                <label for="genderInput" class="form-label">Jenis Kelamin</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender1Radio" value="1" @checked(old('gender') == 1)>
                        <label class="form-check-label" for="gender1Radio">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender2Radio" value="2" @checked(old('gender') == 2)>
                        <label class="form-check-label" for="gender2Radio">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="addressTextarea" class="form-label">Alamat</label>
                <textarea class="form-control" id="addressTextarea" rows="3" name="address">{{old('address')}}</textarea>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</form>

@endsection
