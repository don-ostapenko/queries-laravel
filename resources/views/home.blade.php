@extends('layouts.app')

@section('title', 'Task 1')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <a class="btn btn-primary btn-lg" href="{{ route('first.index') }}">Нажми и начнем!</a>
        </div>
    </div>
@endsection
