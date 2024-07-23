@extends('layouts.app')

@section('content')

{{-- <h1><a href="{{route('transacts.show', $transacts->id)}}">{{$transacts->reference}}</a></h1> --}}
<h2></h2>
    <table class="acc"><tr class="acc">
        <th class="acc">Date</th>
        <th class="acc">Type</th>
        <th class="acc">Name</th>
        <th class="acc">Status</th>
        <th class="acc">Amount</th>
        <th class="acc">Reference</th></tr>
    @foreach($transacts as $transact)
        <tr class="acc">
            <td class="acc">{{ $transact->date }}</td>
            <td class="acc">{{ $types->find($reqs->find($transact->request)->type ?? '')->name ?? '' }}</td>
            <td class="acc"><a href="{{route('accounts.show', $transact->user)}}">{{ $accounts->find($transact->user)->name }}</a></td>
            <td class="acc">{{ $statuses->find($reqs->find($transact->request)->status ?? '')->name ?? '' }}</td>
            <td class="acc">{{ $transact->computed }}</td>
            <td class="acc">{{ $transact->reference }}</td>
        </tr>
    @endforeach
@endsection