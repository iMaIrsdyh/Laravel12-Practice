@extends('layouts.main')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">Edit Assignment</h1>

        <form
            action="{{ route(auth()->user()->isAdmin() ? 'admin.assignments.update' : 'guru.assignments.update', $assignment) }}"
            method="POST" class="space-y-4 rounded border border-slate-200 bg-white p-6 shadow-sm">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Course</label>
                <select name="course_id" class="w-full rounded border border-slate-300 px-3 py-2" required>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $assignment->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->name }} - {{ $course->code }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $assignment->title) }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
                <textarea name="description" class="w-full rounded border border-slate-300 px-3 py-2" rows="4"
                    required>{{ old('description', $assignment->description) }}</textarea>
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Due Date</label>
                <input type="datetime-local" name="due_date"
                    value="{{ old('due_date', $assignment->due_date->format('Y-m-d\TH:i')) }}"
                    class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>

            <button type="submit" class="rounded bg-slate-800 px-4 py-2 text-white">Update</button>
        </form>
    </div>
@endsection