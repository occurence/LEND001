@extends('layouts.app')

@section('content')
    <h1>Edit Account</h1>
    {{-- <form method="post" action="/accounts/{{$account->id}}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
        <input type="submit" name="UPDATE">
    </form>
    <form method="post" action="/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="DELETE">
        {{ csrf_field() }}
    </form> --}}
{{-- @yield('footer') --}}
@endsection