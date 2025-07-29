@section('content')
    <h1>Courses</h1>
    @if (Auth::check() && Auth::user()->isAdmin())
        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>
    @endif
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <p class="card-text">Credits: {{ $course->credits }}</p>
                        @if ($course->schedules && $course->schedules->count())
                            <h6>Schedules:</h6>
                            <ul>
                                @foreach ($course->schedules as $schedule)
                                    <li>{{ $schedule->day }}: {{ $schedule->start_time }} - {{ $schedule->end_time }} at {{ $schedule->location }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if (Auth::check() && Auth::user()->isAdmin())
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('schedules.create', $course) }}" class="btn btn-sm btn-secondary">Add Schedule</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @elseif(Auth::check())
                            <form action="{{ route('enrollments.store', $course) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Enroll</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection