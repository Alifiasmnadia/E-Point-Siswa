@extends('auth.layouts')

@section('content')

    <h1>Login</h1>
    <br><br>
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <label for="email">Email Address</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

@endsection