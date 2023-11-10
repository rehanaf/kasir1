@extends('layout.template')

@section('main')
    <form action="" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="password" placeholder="password">
        <button type="submit">Login</button>
    </form>
@endsection