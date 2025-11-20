@extends('layouts.app')

@section('content')
<div>
    <h1>Student Details</h1>

    <div>
        <div>
            <strong>ID:</strong> {{ $student->id }}
        </div>
        <div>
            <strong>NISN:</strong> {{ $student->nisn }}
        </div>
        <div>
            <strong>Name:</strong> {{ $student->name }}
        </div>
        <div>
            <strong>Major:</strong> {{ $student->major }}
        </div>
        <div>
            <strong>Squad:</strong> {{ $student->squad->name ?? 'N/A' }}
        </div>
        <div>
            <strong>Status:</strong> {{ $student->status }}
        </div>
        <div>
            <strong>Created:</strong> {{ $student->created_at->format('Y-m-d H:i:s') }}
        </div>
        <div>
            <strong>Updated:</strong> {{ $student->updated_at->format('Y-m-d H:i:s') }}
        </div>
    </div>

    <div>
        <a href="{{ route('students.edit', $student) }}">Edit</a>
        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</div>
@endsection
