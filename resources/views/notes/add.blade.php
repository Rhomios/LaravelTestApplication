
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add new Note</h1>
        <form action="{{ url('/api/notes/create') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-600">Content</label>
                <textarea name="content" id="content" class="form-input mt-1 block w-full" required></textarea>
            </div>

            <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded">Create Note</button>
        </form>
    </div>
@endsection

