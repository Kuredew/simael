@extends('layouts.app')

@section('content')
<div>
    <h1>Edit Student</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nisn">NISN</label>
            <input type="number" id="nisn" name="nisn" value="{{ old('nisn', $student->nisn) }}" required>
            @error('nisn')<span>{{ $message }}</span>@enderror
        </div>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            @error('name')<span>{{ $message }}</span>@enderror
        </div>

        <div>
            <label for="major">Major</label>
            <select id="major" name="major" required>
                <option value="">Select Major</option>
                <option value="PPLG" {{ old('major', $student->major) == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                <option value="TJKT" {{ old('major', $student->major) == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                <option value="DKV" {{ old('major', $student->major) == 'DKV' ? 'selected' : '' }}>DKV</option>
                <option value="BCF" {{ old('major', $student->major) == 'BCF' ? 'selected' : '' }}>BCF</option>
            </select>
            @error('major')<span>{{ $message }}</span>@enderror
        </div>

        <div>
            <label for="squad_id">Squad</label>
            <select id="squad_id" name="squad_id" required>
                <option value="">Select Squad</option>
                @foreach($squads as $squad)
                    <option value="{{ $squad->id }}" {{ old('squad_id', $student->squad_id) == $squad->id ? 'selected' : '' }}>{{ $squad->name }}</option>
                @endforeach
            </select>
            @error('squad_id')<span>{{ $message }}</span>@enderror
        </div>

        <div>
            <label for="password">Password (leave blank to keep current)</label>
            <input type="password" id="password" name="password">
            @error('password')<span>{{ $message }}</span>@enderror
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div>
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="pending" {{ old('status', $student->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="verified" {{ old('status', $student->status) == 'verified' ? 'selected' : '' }}>Verified</option>
            </select>
            @error('status')<span>{{ $message }}</span>@enderror
        </div>

        <div>
            <button type="submit">Update Student</button>
            <a href="{{ route('students.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
