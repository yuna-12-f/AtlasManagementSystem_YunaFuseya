@extends('layouts.sidebar')

@section('content')
    <div class="post_create_container d-flex">
        <div class="post_create_area border w-50 m-5 p-5">
            <div class="">
                <p class="mb-0">カテゴリー</p>
                <select class="w-100" form="postCreate" name="sub_category_id">
                    @foreach ($main_categories as $main_category)
                        <optgroup label="{{ $main_category->main_category }}"></optgroup>
                        <!-- サブカテゴリー表示 -->
                        @foreach ($sub_categories as $sub_category)
                            @if ($sub_category->main_category_id == $main_category->id)
                                <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
                            @endif
                        @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                @if ($errors->first('post_title'))
                    <span class="error_message">{{ $errors->first('post_title') }}</span>
                @endif
                <p class="mb-0">タイトル</p>
                <input type="text" class="w-100" form="postCreate" name="post_title" value="{{ old('post_title') }}">
                {{-- <input type="hidden" class="w-100" name="created_at" form="postCreate" value="{{ old('created_at') }}"> --}}
            </div>
            <div class="mt-3">
                @if ($errors->first('post_body'))
                    <span class="error_message">{{ $errors->first('post_body') }}</span>
                @endif
                <p class="mb-0">投稿内容</p>
                <textarea class="w-100" form="postCreate" name="post_body">{{ old('post_body') }}</textarea>
            </div>

            <div class="mt-3 text-right">
                <input type="submit" class="btn btn-primary" value="投稿" form="postCreate">
            </div>
            <form action="{{ route('post.create') }}" method="post" id="postCreate">{{ csrf_field() }}</form>
        </div>
        @can('admin')
            <div class="w-25 ml-auto mr-auto">
                <div class="category_area mt-5 p-5">
                    <div class="">
                        <p class="m-0">メインカテゴリー</p>
                        <input type="text" class="w-100" name="main_category_name" form="mainCategoryRequest">

                        @error('main_category_name')
                            <span class="error_message">{{ $message }}</span>
                        @enderror

                        <input type="submit" value="追加" class="w-100 btn btn-primary p-0" form="mainCategoryRequest">

                    </div>
                    <div class="">
                        <p class="m-0">サブカテゴリー</p>
                        <select name="main_category_id" class="w-100 mb-2" form="subCategoryRequest">
                            <option value="">メインカテゴリーを選択</option>
                            @foreach ($main_categories as $mainCategory)
                                <option value="{{ $mainCategory->id }}">{{ $mainCategory->main_category }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('main_category_id'))
                            <span class="error_message">{{ $errors->first('main_category_id') }}</span>
                        @endif
                        <input type="text" class="w-100 mb-2" name="sub_category_name" form="subCategoryRequest"
                            placeholder="サブカテゴリー名">
                        @if ($errors->has('sub_category_name'))
                            <ul class="error_messages">
                                @foreach ($errors->get('sub_category_name') as $message)
                                    <li class="error_message">{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <input type="submit" value="追加" class="w-100 btn btn-primary p-0" form="subCategoryRequest">
                    </div>
                    <!-- サブカテゴリー追加 -->
                    <form action="{{ route('main.category.create') }}" method="post" id="mainCategoryRequest">
                        {{ csrf_field() }}
                    </form>
                    <form action="{{ route('sub.category.create') }}" method="post" id="subCategoryRequest">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endcan
    </div>
@endsection
