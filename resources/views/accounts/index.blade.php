@extends('layouts.app')
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
@section('content')

<div class="container">
    <div class="row"><br>
        <div class="col-12"><h2></h2></div>
        <div class="col-12">
            <div id="custom-search-input">
                <div class="input-group">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
                </div>
            </div>
        </div>
    </div>
</div>
<br>
{{-- {{$roles->find(1)->name}} --}}
<table class="acc">
    <tr class="acc">
    <th class="acc">Role</th>
    <th class="acc">Name</th>
    <th class="acc">overall</th>
    <th class="acc">principal</th>
    <th class="acc">remit</th></tr>
    {{-- <ul> --}}
        @foreach($accounts as $account)
            {{-- <li> --}}
            <tr class="acc">
                <td class="acc">{{$roles->find($account->role)->role}}</td>
                <td class="acc"><a href="{{route('accounts.show', $account->id)}}">{{$account->name}}</a></td>
                <td class="acc">{{$account->overall}}</td>
                <td class="acc">{{$account->principal}}</td>
                <td class="acc">{{$account->remit}}</td>
                <td class="acc">{{$account->overall - $account->remit}}</td>
            {{-- </li> --}}
            </tr>
        @endforeach
    {{-- </ul> --}}
</table>
{{-- @yield('footer') --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var route = "{{ url('search-autocomplete') }}";
    $('#search').typeahead({
        source:  function (term, process) {
            return $.get(route, { term: term }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection