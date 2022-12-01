@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>

<form method="post" action="{{ url("/clause/{$clause->id}/edit") }}">
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
                <label for="chapterInput" class="form-label">Pasal</label>
                <input type="string" class="form-control" id="chapterInput" placeholder="Pasal" name="chapter" value="{{old('chapter',$clause->chapter)}}">
            </div>
            <div class="mb-3">
                <label for="clause_typeInput" class="form-label">Jenis Pasal</label>
                <input type="text" class="form-control" id="clause_typeInput" placeholder="Jenis Pasal" name="clause_type" value="{{old('clause_type',$clause->clause_type)}}">
            </div>
            <div class="mb-3">
                <label for="clause_scoreInput" class="form-label">Nilai Poin</label>
                <input type="text" class="form-control" id="clause_scoreInput" placeholder="Nilai Poin" name="clause_score" value="{{old('clause_score',$clause->clause_score)}}">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </div>
    </div>
</form>

@endsection
