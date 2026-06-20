<aside class="w-72 border-r border-slate-200 bg-white p-6">
    <nav class="space-y-3">
        <a href="{{ route('dashboard') }}"
            class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Dashboard</a>

        @auth
            @if (auth()->user()->isAdmin())
                <a href="{{ route('admin.users.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Users</a>
                <a href="{{ route('admin.courses.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Courses</a>
                <a href="{{ route('admin.assignments.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Assignments</a>
            @endif

            @if (auth()->user()->isGuru())
                <a href="{{ route('guru.courses.index') }}" class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">My
                    Courses</a>
                <a href="{{ route('guru.assignments.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Assignments</a>
                <a href="{{ route('guru.submissions.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Submissions</a>
            @endif

            @if (auth()->user()->isSiswa())
                <a href="{{ route('siswa.enrollments.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Enrollments</a>
                <a href="{{ route('siswa.submissions.index') }}"
                    class="block rounded px-3 py-2 text-slate-700 hover:bg-slate-100">Submissions</a>
            @endif
        @endauth
    </nav>
</aside>