@extends('layouts.app')

@section('content')
{{-- {{use App\Models\Transact;}} --}}
<h1><a href="{{route('accounts.edit', $account->id)}}">{{$account->name}}</a></h1>
<h2>{{$account->overall}} - {{$account->remit}} = {{$account->overall-$account->remit}}</h4>
<h2>LEND</h2>
    <table class="acc"><tr>
        <th class="acc">Date</th>
        <th class="acc">Amount</th>
        <th class="acc">Interest</th>
        <th class="acc">Computed</th>
        <th class="acc">Reference</th></tr>
        {{-- {{ $transacts->find('user', 1) }} <br>
        {{ count($transacts->where('user', 1)) }} <br> --}}
            @php
                $lend1=$transacts->where('user', $account->id)->pluck('time');
                $lend2=$transacts->where('user', $account->id)->pluck('amount');
                $lend3=$transacts->where('user', $account->id)->pluck('interest');
                $lend4=$transacts->where('user', $account->id)->pluck('computed');
                $lend5=$transacts->where('user', $account->id)->pluck('reference');
            @endphp
            @for($i = 0;$i < count($transacts->where('user', $account->id)); $i++)
                <tr class="acc">
                    <td>{{ $lend1[$i] }}</td>
                    <td>{{ $lend2[$i] }}</td>
                    <td>{{ $lend3[$i]*100 }}%</td>
                    <td>{{ $lend4[$i] }}</td>
                    <td>{{ $lend5[$i] }}</td>
                </tr>
            @endfor
    </table>

    <h2>REMIT</h2>
    <table class="acc"><tr>
        <th class="acc">Date</th>
        <th class="acc">Amount</th></tr>
            @php
                $remit1=$remits->where('user', $account->id)->pluck('time');
                $remit2=$remits->where('user', $account->id)->pluck('amount');
            @endphp
            @for($i = 0;$i < count($remits->where('user', $account->id)); $i++)
                <tr class="acc">
                    <td>{{ $remit1[$i] }}</td>
                    <td>{{ $remit2[$i] }}</td>
                </tr>
            @endfor
    </table>

{{-- @yield('footer') --}}
@endsection