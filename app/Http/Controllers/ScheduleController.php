<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create(Course $course)
    {
        return view('schedules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required'
        ]);

        $validated['course_id'] = $course->id;
        Schedule::create($validated);

        return redirect()->route('courses.index')->with('success', 'Schedule added successfully');
    }
}