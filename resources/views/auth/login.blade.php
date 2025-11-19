@extends('layouts.app')

@section('title', 'Login')

@section('content')

@if (session()->has('failed'))
<p>{{ session('failed') }}</p>
@endif

@if (session()->has('success'))
<p>{{ session('success') }}</p>
@endif

<form action="{{ route('login') }}" method="post">
    @csrf

    <input name="nisn" type="number" placeholder="NISN">
    <input name="password" type="text" placeholder="Password">
    <button type="submit">Submit</button>
</form>

@endsection