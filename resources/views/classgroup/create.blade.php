@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>

<form method="post" action="/classgroup/create">
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
                <label for="class_nameInput" class="form-label">Nama Kelas</label>
                <input type="string" class="form-control" id="class_nameInput" placeholder="Nama Kelas" name="class_name" value="{{old('class_name')}}">
            </div>
            <div class="mb-3">
                <label for="homeroom_teacherInput" class="form-label">Wali Kelas</label>
                <input type="text" class="form-control" id="homeroom_teacherInput" placeholder="Wali Kelas" name="homeroom_teacher" value="{{old('homeroom_teacher')}}">
            </div>
            <div class="mb-3">
                <label for="majorIdSelect" class="form-label">Jurusan</label>
                <select class="form-control" name="major_id" id="majorIdSelect">
                    <option value="">.: Pilih Jurusan :.</option>
                    @foreach ($majors as $item)
                        <option value="{{ $item->id }}" @selected(old('major_id') == $item->id)>{{ $item->major_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </div>
    </div>
</form>

@endsection
