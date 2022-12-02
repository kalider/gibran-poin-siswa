@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    @if (request()->session()->has('success'))
        <div class="alert alert-success">{{ request()->session()->get('success') }}</div>
    @endif
    @if (request()->session()->has('error'))
        <div class="alert alert-danger">{{ request()->session()->get('error') }}</div>
    @endif

    <form class="mb-3">
        <div class="row">
            <div class="col-lg-3">
                <select name="class_id" id="classIdSelect" class="form-control">
                    <option value="">.: Pilih Kelas :.</option>
                    @foreach ($class_groups as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3">
                <input type="search" class="form-control" name="name" value="{{ request()->input('name') }}"
                    placeholder="Filter ...">
            </div>
            <div class="col-lg-3">
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Poin</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($report as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->class }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Siswa belum tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $report->appends(request()->query())->links() }}

@endsection
