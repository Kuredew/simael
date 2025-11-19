@extends('layouts.app')

@section('title', 'Login')

@section('content')

<h1>Welcome {{ $student['name'] }}</h1>
@if ($squad)
<p>Squad kamu : {{ $squad->name }}</p>    
@else
<p>Kamu belum masuk kedalam squad</p>
@endif
<form action="{{ route('logout') }}" method="post">
    @csrf

    <button type="submit">Logout</button>
</form>

@endsection