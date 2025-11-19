@extends('layouts.app')

@section('title', 'Login')

@section('content')

@if (session()->has('failed'))
<p>{{ session('failed') }}</p>
@endif

<form action="{{ route('register') }}" method="post">
    @csrf

    <input name="name" type="text">
    <input name="nisn" type="number" placeholder="NISN">
    <select name="major" id="">
        <option value="PPLG">PPLG</option>
        <option value="TJKT">TJKT</option>
        <option value="DKV">DKV</option>
        <option value="BCF">BCF</option>
    </select>
    <input name="password" type="text" placeholder="Password">
    <input name="confirm-password" type="text" placeholder="Confirm Password">
    <button type="submit">Submit</button>
</form>

@endsection