<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
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
            $assignments = Assignment::query()->with('course.teacher')->get();
        } else {
            $assignments = Assignment::query()
                ->with('course.teacher')
                ->whereHas('course', function (Builder $query) use ($user) {
                    return $query->whereTeacherId($user->id);
                })
                ->get();
        }

        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $user = $this->currentUser();

        $courses = Course::query()->when($user->isGuru(), function (Builder $query) use ($user) {
            return $query->whereTeacherId($user->id);
        })->get();

        return view('assignments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $course = Course::findOrFail($request->course_id);
        $user = $this->currentUser();

        if ($user->isGuru() && $course->teacher_id !== $user->id) {
            abort(403);
        }

        Assignment::create($request->only(['course_id', 'title', 'description', 'due_date']));

        return redirect()->route($user->isAdmin() ? 'admin.assignments.index' : 'guru.assignments.index')
            ->with('success', 'Assignment berhasil dibuat.');
    }

    public function show(Assignment $assignment)
    {
        $this->authorizeAssignment($assignment);

        return view('assignments.show', ['assignment' => $assignment->load('course.teacher')]);
    }

    public function edit(Assignment $assignment)
    {
        $this->authorizeAssignment($assignment);

        $user = $this->currentUser();

        $courses = Course::query()->when($user->isGuru(), function (Builder $query) use ($user) {
            return $query->whereTeacherId($user->id);
        })->get();

        return view('assignments.edit', compact('assignment', 'courses'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $this->authorizeAssignment($assignment);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $course = Course::findOrFail($request->course_id);
        $user = $this->currentUser();

        if ($user->isGuru() && $course->teacher_id !== $user->id) {
            abort(403);
        }

        $assignment->update($request->only(['course_id', 'title', 'description', 'due_date']));

        return redirect()->route($user->isAdmin() ? 'admin.assignments.index' : 'guru.assignments.index')
            ->with('success', 'Assignment berhasil diperbarui.');
    }

    public function destroy(Assignment $assignment)
    {
        $this->authorizeAssignment($assignment);
        $assignment->delete();

        $user = $this->currentUser();

        return redirect()->route($user->isAdmin() ? 'admin.assignments.index' : 'guru.assignments.index')
            ->with('success', 'Assignment berhasil dihapus.');
    }

    protected function authorizeAssignment(Assignment $assignment): void
    {
        $user = $this->currentUser();

        if ($user->isGuru() && $assignment->course->teacher_id !== $user->id) {
            abort(403);
        }
    }
}
