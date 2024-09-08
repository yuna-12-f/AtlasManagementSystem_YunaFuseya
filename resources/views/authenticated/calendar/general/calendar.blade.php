@extends('layouts.sidebar')

@section('content')
    <div class="vh-100 pt-5" style="background:#ECF1F6;">
        <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
            <div class="w-75 m-auto border" style="border-radius:5px;">

                <p class="text-center">{{ $calendar->getTitle() }}</p>
                <div class="">
                    {!! $calendar->render() !!}
                </div>
            </div>
            <div class="text-right w-75 m-auto">
                <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
            </div>
        </div>
    </div>

    {{-- モーダル --}}
    {{-- js --}}

    <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/delete/calendar" method="POST" id="cancelForm">
                <p class="modal_day"><strong>予約日:</strong></p>
                <p class="modal_part"><strong>時間:</strong></p>
                <input type="hidden" name="cancelDay" class="modal_day" value="">
                <input type="hidden" name="partNumber" class="modal_part" value="">
                <p>上記の予約をキャンセルしてよろしいですか？</p>
                <a class="js-modal-close" href="#">閉じる</a>
                <button id="confirmCancelButton" class="btn btn-danger">キャンセルする</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
