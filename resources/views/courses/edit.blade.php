// resources/views/courses/edit.blade.php
@extends('layouts.app')

@section('content')
    <h1>Edit Course</h1>
    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $course->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Credits</label>
            <input type="number" name="credits" class="form-control" value="{{ $course->credits }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection