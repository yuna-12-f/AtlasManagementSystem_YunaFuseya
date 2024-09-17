@extends('layouts.sidebar')

@section('content')
    <p>ユーザー検索</p>
    <div class="search_content w-100 border d-flex">
        <div class="reserve_users_area">
            @foreach ($users as $user)
                <div class="border one_person">
                    <div>
                        <span>ID : </span><span>{{ $user->id }}</span>
                    </div>
                    <div><span>名前 : </span>
                        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
                            <span>{{ $user->over_name }}</span>
                            <span>{{ $user->under_name }}</span>
                        </a>
                    </div>
                    <div>
                        <span>カナ : </span>
                        <span>({{ $user->over_name_kana }}</span>
                        <span>{{ $user->under_name_kana }})</span>
                    </div>
                    <div>
                        @if ($user->sex == 1)
                            <span>性別 : </span><span>男</span>
                        @elseif($user->sex == 2)
                            <span>性別 : </span><span>女</span>
                        @else
                            <span>性別 : </span><span>その他</span>
                        @endif
                    </div>
                    <div>
                        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
                    </div>
                    <div>
                        @if ($user->role == 1)
                            <span>権限 : </span><span>教師(国語)</span>
                        @elseif($user->role == 2)
                            <span>権限 : </span><span>教師(数学)</span>
                        @elseif($user->role == 3)
                            <span>権限 : </span><span>講師(英語)</span>
                        @else
                            <span>権限 : </span><span>生徒</span>
                        @endif
                    </div>
                    <div>
                        @if ($user->role == 4)
                            <span>選択科目 :</span>
                            <span>
                                @foreach ($user->subjects as $subject)
                                    {{ $subject->subject }}
                                @endforeach
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="search_area w-25 border">
            <div class="">
                <p class="search_word">検索</p>
                <div>
                    <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
                </div>
                <div>
                    <lavel class="category_word">カテゴリ</lavel>
                    <br>
                    <select class="free_select" form="userSearchRequest" name="category">
                        <option value="name">名前</option>
                        <option value="id">社員ID</option>
                    </select>
                </div>
                <div>
                    <label class="category_word">並び替え</label>
                    <br>
                    <select class="free_select" name="updown" form="userSearchRequest">
                        <option value="ASC">昇順</option>
                        <option value="DESC">降順</option>
                    </select>
                </div>

                <div class="accordion search_add">
                    <div class="accordion-container">
                        <div class="accordion-item">
                            <div class="accordion-title js-accordion-title">
                                <p class="m-0 search_conditions">
                                    <span class="search_span">検索条件の追加</span>
                                </p>
                            </div>
                            <div class="accordion-content">
                                <div class="search_conditions_inner">
                                    <div class="sex_size">
                                        <label class="category_sex">性別</label>
                                        <br>
                                        <span class="label_black">男</span><input type="radio" name="sex"
                                            value="1" form="userSearchRequest">
                                        <span class="label_black">女</span><input type="radio" name="sex"
                                            value="2" form="userSearchRequest">
                                        <span class="label_black">その他</span><input type="radio" name="sex"
                                            value="3" form="userSearchRequest">
                                    </div>
                                    <div>
                                        <label class="category_sex">権限</label>
                                        <br>
                                        <select name="role" form="userSearchRequest" class="engineer free_select_role">
                                            <option selected disabled>----</option>
                                            <option value="1">教師(国語)</option>
                                            <option value="2">教師(数学)</option>
                                            <option value="3">教師(英語)</option>
                                            <option value="4" class="">生徒</option>
                                        </select>
                                    </div>
                                    <label class="category_sex">選択科目</label>
                                    <div class="subcategory_select">
                                        @foreach ($subjects as $subject)
                                            <div>
                                                <label class="label_black_sub">
                                                    {{ $subject->subject }}
                                                    <input type="checkbox" name="subjects[]" value="{{ $subject->id }}"
                                                        form="userSearchRequest">
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div>
                    <input class="postbrn btn_search" type="submit" name="search_btn" value="検索"
                        form="userSearchRequest">
                </div>
                <div>
                    <input class="search_reset" type="reset" value="リセット" form="userSearchRequest">
                </div>
            </div>
            <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
        </div>
    </div>
@endsection
