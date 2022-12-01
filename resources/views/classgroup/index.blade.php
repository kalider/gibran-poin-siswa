@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
    <a href="/classgroup/create" class="btn btn-primary">Tambah Kelas</a>
</div>
@if(request()->session()->has('success'))
    <div class="alert alert-success">{{request()->session()->get('success')}}</div>
@endif
@if(request()->session()->has('error'))
    <div class="alert alert-danger">{{request()->session()->get('error')}}</div>
@endif


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Jurusan</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($classgroups as $classgroup)
            <tr>
                <td>{{$classgroup->id}}</td>
                <td>{{$classgroup->class_name}}</td>
                <td>{{$classgroup->homeroom_teacher}}</td>
                <td>{{$classgroup->major}}</td>
                <td>
                    <a href="{{ url("/classgroup/{$classgroup->id}/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ url("/classgroup/{$classgroup->id}/delete") }}" method="post" onSubmit="return confirm('Apakah anda yakin menghapus kelas ini?')">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Rombongan Kelas belum tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$classgroups->links()}}

@endsection
