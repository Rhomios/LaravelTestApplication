@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="display: flex">
            <h1>Note List</h1>

            <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded" style="margin-left: 6px" onclick="addNewNote()">New Note</button>
        </div>

        @if(count($notes) > 0)
            <ul>
                @foreach($notes as $note)
                    <li style="margin-top: 5px; border: 1px solid; cursor: pointer" onclick="redirectToNote({{ $note->id }})">
                        <div>Title: {{ $note->title }}</div>
                        <div>Created at: {{ $note->created_at }}</div>
                        <div>Content: {{ $note->content }}</div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No notes available.</p>
        @endif

        <script>
            function redirectToNote(noteId) {
                window.location.href = `/notes/page/${noteId}`
            }
            function addNewNote() {
                window.location.href = `/notes/add`
            }
        </script>
    </div>
@endsection
