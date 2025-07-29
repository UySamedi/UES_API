// resources/views/enrollments/index.blade.php
@extends('layouts.app')

@section('content')
    <h1>Enrollments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->user->name }}</td>
                    <td>{{ $enrollment->course->title }}</td>
                    <td>{{ $enrollment->status }}</td>
                    <td>
                        @if ($enrollment->status == 'pending')
                            <form action="{{ route('enrollments.approve', $enrollment) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                            <form action="{{ route('enrollments.reject', $enrollment) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection