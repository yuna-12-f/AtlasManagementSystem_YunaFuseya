@extends('layouts.sidebar')

@section('content')
    <div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
        <div class="w-50 m-auto h-75">
            <p><span>{{ $date }}</span><span class="ml-3">{{ $part }}部</span></p>
            <div class="h-75 border reserve_border">
                <table class="reserve_table">
                    <tr class="">
                        <th class="w-25 reserve_ID">ID</th>
                        <th class="w-25 reserve_name">名前</th>
                        <th class="w-25 reserve_place">場所</th>
                    </tr>
                    @if ($reservePersons && $reservePersons->users->first())
                        @foreach ($reservePersons->users as $user)
                            <tr class="text-center">
                                <td class="w-25 reserve">{{ $user->id }}</td>
                                <td class="w-25 reserve">{{ $user->over_name }}{{ $user->under_name }}</td>
                                <td class="w-25 reserve">リモート</td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="2">予約者がいません</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
