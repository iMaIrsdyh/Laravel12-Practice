<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
            $courses = Course::query()->with('teacher')->get();
        } else {
            $courses = Course::query()->with('teacher')->whereTeacherId($user->id)->get();
        }

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:courses,code',
            'description' => 'required|string',
        ]);

        Course::create([
            'teacher_id' => Auth::id(),
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        $user = $this->currentUser();

        return redirect()->route($user->isAdmin() ? 'admin.courses.index' : 'guru.courses.index')
            ->with('success', 'Course berhasil dibuat.');
    }

    public function show(Course $course)
    {
        $this->authorizeCourse($course);

        return view('courses.show', ['course' => $course->load('teacher')]);
    }

    public function edit(Course $course)
    {
        $this->authorizeCourse($course);

        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, Course $course)
    {
        $this->authorizeCourse($course);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:courses,code,' . $course->id,
            'description' => 'required|string',
        ]);

        $course->update($request->only(['name', 'code', 'description']));

        $user = $this->currentUser();

        return redirect()->route($user->isAdmin() ? 'admin.courses.index' : 'guru.courses.index')
            ->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $this->authorizeCourse($course);

        $course->delete();

        $user = $this->currentUser();

        return redirect()->route($user->isAdmin() ? 'admin.courses.index' : 'guru.courses.index')
            ->with('success', 'Course berhasil dihapus.');
    }

    protected function authorizeCourse(Course $course): void
    {
        $user = $this->currentUser();

        if ($user->isGuru() && $course->teacher_id !== $user->id) {
            abort(403);
        }
    }
}
