// routes/web.php
<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::resource('courses', CourseController::class);
Route::get('courses/{course}/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('courses/{course}/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::post('courses/{course}/enroll', [EnrollmentController::class, 'store'])->name('enrollments.store');
Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::put('enrollments/{enrollment}/approve', [EnrollmentController::class, 'approve'])->name('enrollments.approve');
Route::put('enrollments/{enrollment}/reject', [EnrollmentController::class, 'reject'])->name('enrollments.reject');