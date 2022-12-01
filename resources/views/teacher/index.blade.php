@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
    <a href="/teacher/create" class="btn btn-primary">Tambah Guru</a>
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
            <th>NIP</th>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Rumah</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->nip}}</td>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->study_name}}</td>
                <td>@if($teacher->gender == 1)
                    Laki-laki
                @else
                    Perempuan
                @endif
                </td>
                <td>{{$teacher->address}}</td>
                <td>
                    <a href="{{ url("/teacher/{$teacher->id}/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ url("/teacher/{$teacher->id}/delete") }}" method="post" onSubmit="return confirm('Apakah anda yakin menghapus Guru ini?')">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>

                </tr>
        @empty
            <tr>
                <td colspan="7">Guru belum tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$teachers->links()}}

@endsection
