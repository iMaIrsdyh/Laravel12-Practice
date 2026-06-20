<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $enrollments = Enrollment::query()->with('course.teacher')
            ->whereStudentId($user->id)
            ->get();

        $courses = Course::query()->with('teacher')
            ->whereDoesntHave('enrollments', function (Builder $query) use ($user) {
                return $query->whereStudentId($user->id);
            })
            ->get();

        return view('siswa.enrollments.index', compact('enrollments', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $exists = Enrollment::query()->whereStudentId(Auth::id())
            ->whereCourseId($request->course_id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['course_id' => 'Anda sudah terdaftar di course ini.']);
        }

        Enrollment::create([
            'student_id' => Auth::id(),
            'course_id' => $request->course_id,
            'enrolled_at' => now(),
        ]);

        return redirect()->route('siswa.enrollments.index')->with('success', 'Berhasil daftar course.');
    }

    public function destroy(Enrollment $enrollment)
    {
        if ($enrollment->student_id !== Auth::id()) {
            abort(403);
        }

        if ($enrollment->course->assignments()->whereHas('submissions', function (Builder $query) {
            return $query->where(['student_id' => Auth::id()]);
        })->exists()) {
            return back()->withErrors(['enrollment' => 'Tidak dapat batal enroll karena sudah ada submission.']);
        }

        $enrollment->delete();

        return redirect()->route('siswa.enrollments.index')->with('success', 'Enroll berhasil dibatalkan.');
    }
}
