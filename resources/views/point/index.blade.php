@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
    <a href="/point/create" class="btn btn-primary">Tambah Poin</a>
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
            <th>Nama Siswa</th>
            <th>Poin</th>
            <th>Tanggal Kejadian</th>
            <th>Pelapor</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($points as $point)
            <tr>
                <td>{{$point->id}}</td>
                <td>{{$point->student}}</td>
                <td>{{$point->score}}</td>
                <td>{{$point->point_date}}</td>
                <td>{{$point->teacher}}</td>
                <td>
                    <a href="{{ url("/point/{$point->id}/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ url("/point/{$point->id}/delete") }}" method="post" onSubmit="return confirm('Apakah anda yakin menghapus poin ini?')">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7">Poin belum tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$points->appends(request()->query())->links()}}

@endsection
