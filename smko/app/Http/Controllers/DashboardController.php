<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected function currentUser(): User
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            abort(403);
        }

        return $user;
    }

    public function index()
    {
        $user = $this->currentUser();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isGuru()) {
            return redirect()->route('guru.dashboard');
        }

        if ($user->isSiswa()) {
            return redirect()->route('siswa.dashboard');
        }

        abort(403);
    }


    public function adminDashboard()
    {
        $totalGuru = User::query()->whereRole('guru')->count();
        $totalSiswa = User::query()->whereRole('siswa')->count();
        $totalCourse = Course::query()->count();
        $totalAssignment = Assignment::query()->count();

        return view('admin.dashboard', compact('totalGuru', 'totalSiswa', 'totalCourse', 'totalAssignment'));
    }

    public function guruDashboard()
    {
        $user = $this->currentUser();

        $courses = Course::query()->whereTeacherId($user->id)->with('teacher')->get();
        $assignmentsCount = Assignment::query()->whereHas('course', function (Builder $query) use ($user) {
            return $query->whereTeacherId($user->id);
        })->count();
        $submissionsCount = Submission::query()->whereHas('assignment.course', function (Builder $query) use ($user) {
            return $query->whereTeacherId($user->id);
        })->count();

        return view('guru.dashboard', compact('courses', 'assignmentsCount', 'submissionsCount'));
    }

    public function siswaDashboard()
    {
        $user = $this->currentUser();

        $courses = Course::query()->whereHas('enrollments', function (Builder $query) use ($user) {
            return $query->whereStudentId($user->id);
        })->with('teacher')->get();
        $submissionsCount = Submission::query()->whereStudentId($user->id)->count();
        $nilaiRata = Submission::query()->whereStudentId($user->id)->whereNotNull('score')->avg('score');

        return view('siswa.dashboard', compact('courses', 'submissionsCount', 'nilaiRata'));
    }
}
