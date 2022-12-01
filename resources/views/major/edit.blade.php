@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>

<form method="post" action="{{ url("/major/{$major->id}/edit") }}">
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
                <label for="major_codeInput" class="form-label">Kode Jurusan</label>
                <input type="string" class="form-control" id="major_codeInput" placeholder="Kode Jurusan" name="major_code" value="{{old('major_code',$major->major_code)}}">
            </div>
            <div class="mb-3">
                <label for="major_nameInput" class="form-label">Nama Jurusan</label>
                <input type="text" class="form-control" id="major_nameInput" placeholder="Nama jurusan" name="major_name" value="{{old('major_name',$major->major_name)}}">
            </div>
            <div class="mb-3">
                <label for="major_leaderInput" class="form-label">Ketua Jurusan</label>
                <input type="text" class="form-control" id="major_leaderInput" placeholder="Ketua Jurusan" name="major_leader" value="{{old('major_leader',$major->major_leader)}}">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </div>
    </div>
</form>

@endsection
