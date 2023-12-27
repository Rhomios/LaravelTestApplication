@extends('layouts.app')

@section('content')
    @if(isset($note))
        <h1>Note {{ $note->id }}</h1>

        <div>
            <h2>Title: {{ $note->title }}</h2>
            <div style="margin-top: 5px">
                Content:
            </div>
            <p>{{ $note->content }}</p>
        </div>
    @else
        <p>This note doesn't exist.</p>
    @endif

@endsection
