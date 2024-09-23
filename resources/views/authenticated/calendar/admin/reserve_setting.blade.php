@extends('layouts.sidebar')
@section('content')
    {{-- <div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
        <div class="w-100 vh-100 border p-5"> --}}
    <div class="pt-5 pb-5" style="background:#ECF1F6;">
        <div class="border w-75 m-auto pt-5 pb-5"
            style="border-radius:5px; background:#FFF; box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.2);">
            <p class="cala_year">{{ $calendar->getTitle() }}</p>
            <div class="w-75 m-auto border" style="border-radius:5px;">

                {!! $calendar->render() !!}
            </div>
            <div class="m-auto">
                <input type="submit" class="btn btn-primary btn_reserve" value="登録" form="reserveSetting"
                    onclick="return confirm('登録してよろしいですか？')">
            </div>


            {{-- </div>
    </div> --}}
        @endsection
