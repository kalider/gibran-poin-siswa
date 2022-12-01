@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>

<form method="post" action="/point/create">
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
                <label for="studentIdSelect" class="form-label">Nama Siswa</label>
                <select class="form-control" name="student_id" id="studentIdSelect">
                    <option value="">.: Pilih Siswa :.</option>
                    @foreach ($students as $item)
                        <option value="{{ $item->id }}" @selected(old('student_id') == $item->id)>{{ $item->name }}<span>@selected(old('student_id') == $item->id)>{{ $item->class}}</span></option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="clauseIdSelect" class="form-label">Terkena Pasal</label>
                <select class="form-control" name="clause_id" id="clauseIdSelect">
                    <option value="">.: Pilih Pasal :.</option>
                    @foreach ($clauses as $item)
                        <option value="{{ $item->id }}" @selected(old('clause_id') == $item->id)>{{ $item->chapter}}<span>@selected(old('clause_id') == $item->id)>{{ $item->clause_type}}</span></option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="point_dateInput" class="form-label">Tanggal Kejadian</label>
                <input type="date" class="form-control" id="point_dateInput" placeholder="Tanggal Kejadian" name="point_date" value="{{old('point_date')}}">
            </div>
            <div class="mb-3">
                <label for="teacherIdSelect" class="form-label">Nama Pelapor</label>
                <select class="form-control" name="teacher_id" id="teacherIdSelect">
                    <option value="">.: Pilih Guru :.</option>
                    @foreach ($teachers as $item)
                        <option value="{{ $item->id }}" @selected(old('teacher_id') == $item->id)>{{ $item->name }}<span>@selected(old('teacher_id') == $item->id)>{{ $item->study_name }}</span></option>
                    @endforeach
                </select>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</form>

@endsection
