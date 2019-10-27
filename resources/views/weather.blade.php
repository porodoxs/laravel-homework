@extends('layouts')
@section('title', 'Weather')

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h1>Температура в Брянске {{$temperature}}°C</h1>
        </div>
    </div>
@endsection
