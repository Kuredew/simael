@extends('layouts.app')

@section('content')
<div>
    <h1>Students</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="{{ route('students.create') }}">Create New Student</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NISN</th>
                <th>Name</th>
                <th>Major</th>
                <th>Squad</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->nisn }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->squad->name ?? 'N/A' }}</td>
                    <td>{{ $student->status }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}">View</a>
                        <a href="{{ route('students.edit', $student) }}">Edit</a>
                        <form method="POST" action="{{ route('students.destroy', $student) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
