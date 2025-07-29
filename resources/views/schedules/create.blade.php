// resources/views/schedules/create.blade.php
@extends('layouts.app')

@section('content')
    <h1>Add Schedule for {{ $course->title }}</h1>
    <form action="{{ route('schedules.store', $course) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Day</label>
            <select name="day" class="form-control" required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div>
        <div class="form-group">
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Schedule</button>
    </form>
@endsection