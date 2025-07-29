<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['index', 'approve', 'reject']);
    }

    public function store(Request $request, Course $course)
    {
        $user = Auth::user();

        // Check if user already enrolled in 3 courses
        if ($user->enrollments()->where('status', 'approved')->count() >= 3) {
            return redirect()->route('courses.index')->with('error', 'Maximum 3 courses allowed');
        }

        // Check if already enrolled in this course
        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return redirect()->route('courses.index')->with('error', 'Already enrolled in this course');
        }

        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => 'pending'
        ]);

        return redirect()->route('courses.index')->with('success', 'Enrollment request submitted');
    }

    public function index()
    {
        $enrollments = Enrollment::with(['user', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function approve(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'approved']);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment approved');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'rejected']);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment rejected');
    }
}