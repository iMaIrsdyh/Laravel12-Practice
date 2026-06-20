<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
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

        if ($user->isSiswa()) {
            $submissions = Submission::query()->with(['assignment.course'])
                ->whereStudentId($user->id)
                ->get();

            return view('siswa.submissions.index', compact('submissions'));
        }

        $submissions = Submission::query()->with(['assignment.course', 'student'])
            ->whereHas('assignment.course', function (Builder $query) use ($user) {
                return $query->whereTeacherId($user->id);
            })
            ->get();

        return view('guru.submissions.index', compact('submissions'));
    }

    public function create()
    {
        $user = $this->currentUser();

        $assignments = Assignment::query()->whereHas('course.enrollments', function (Builder $query) use ($user) {
            return $query->whereStudentId($user->id);
        })->get();

        return view('siswa.submissions.create', compact('assignments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'file_path' => 'required|string|max:255',
        ]);

        $exists = Submission::query()->whereAssignmentId($request->assignment_id)
            ->whereStudentId(Auth::id())
            ->exists();

        if ($exists) {
            return back()->withErrors(['assignment_id' => 'Anda sudah mengirimkan tugas ini.']);
        }

        Submission::create([
            'assignment_id' => $request->assignment_id,
            'student_id' => Auth::id(),
            'file_path' => $request->file_path,
            'submitted_at' => now(),
        ]);

        return redirect()->route('siswa.submissions.index')->with('success', 'Submission berhasil dikirim.');
    }

    public function show(Submission $submission)
    {
        $this->authorizeSubmission($submission);

        return view('submissions.show', ['submission' => $submission->load('assignment.course', 'student')]);
    }

    public function edit(Submission $submission)
    {
        $this->authorizeSubmission($submission);

        return view('submissions.edit', compact('submission'));
    }

    public function update(Request $request, Submission $submission)
    {
        $this->authorizeSubmission($submission);

        $request->validate([
            'score' => 'nullable|integer|min:0|max:100',
        ]);

        $submission->update($request->only(['score']));

        return redirect()->route('guru.submissions.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    protected function authorizeSubmission(Submission $submission): void
    {
        $user = $this->currentUser();

        if ($user->isSiswa() && $submission->student_id !== $user->id) {
            abort(403);
        }

        if ($user->isGuru() && $submission->assignment->course->teacher_id !== $user->id) {
            abort(403);
        }
    }
}
