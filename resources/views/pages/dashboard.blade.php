@extends('layouts.app')

@section('title', 'Login')

@section('content')

<h1>Welcome {{ $student['name'] }}</h1>
<form action="{{ route('logout') }}" method="post">
    @csrf

    <button type="submit">Logout</button>
</form>

@endsection