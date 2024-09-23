@extends('layouts.sidebar')

@section('content')
    {{-- <div class="w-75 m-auto">
  <div class="w-100"> --}}
    <div class="pt-5 pb-5" style="background:#ECF1F6;">
        <div class="border w-75 m-auto pt-5 pb-5"
            style="border-radius:5px; background:#FFF; box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.2);">
            <p class="cala_year">{{ $calendar->getTitle() }}</p>
            <div class="w-75 m-auto border" style="border-radius:5px;">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>
@endsection
