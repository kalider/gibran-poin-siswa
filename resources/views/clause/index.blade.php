@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
    <a href="/clause/create" class="btn btn-primary">Tambah Pelanggan</a>
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
            <th>Pasal</th>
            <th>Jenis Pasal</th>
            <th>Poin</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($clauses as $clause)
            <tr>
                <td>{{$clause->id}}</td>
                <td>{{$clause->chapter}}</td>
                <td>{{$clause->clause_type}}</td>
                <td>{{$clause->clause_score}}</td>
                <td>
                    <a href="{{ url("/clause/{$clause->id}/edit") }}" class="btn btn-primary btn-sm">Edit</a>
                    <form class="d-inline" action="{{ url("/clause/{$clause->id}/delete") }}" method="post" onSubmit="return confirm('Apakah anda yakin menghapus pasal ini?')">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7">Pasal belum tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$clauses->links()}}

@endsection
