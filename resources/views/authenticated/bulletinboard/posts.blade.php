@extends('layouts.sidebar')

@section('content')
    <div class="board_area w-100 border m-auto d-flex">
        <div class="post_view w-75 mt-5">
            <p class="w-75 m-auto">投稿一覧</p>
            @foreach ($posts as $post)
                <div class="post_area border w-75 m-auto p-3">
                    <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん
                    </p>
                    <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
                    <div class="post_bottom_area d-flex">
                        <div class="d-flex post_status">
                            <div class="post_subcategory">
                                <ul>
                                    @foreach ($post->subCategories as $subCategory)
                                        <li class="category_btn">
                                            {{ $subCategory->sub_category }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="post_reaction">
                                <div class="mr-5">
                                    <i class="fa fa-comment"></i>
                                    <span
                                        class="comment_counts{{ $post->id }}">{{ $post->postComments->count() }}</span>
                                </div>
                                <div>
                                    @if (Auth::user()->is_Like($post->id))
                                        <p class="m-0"><i class="fas fa-heart un_like_btn"
                                                post_id="{{ $post->id }}"></i>
                                            {{-- <span class="like_counts{{ $post->id }}"></span> --}}
                                            <span class="like_counts{{ $post->id }}">{{ $post->like->count() }}</span>
                                        </p>
                                    @else
                                        <p class="m-0"><i class="fas fa-heart like_btn"
                                                post_id="{{ $post->id }}"></i>
                                            {{-- <span class="like_counts{{ $post->id }}"></span> --}}
                                            <span class="like_counts{{ $post->id }}">{{ $post->like->count() }}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="other_area border w-25">
            <div class="border m-4">
                <div class=""><a href="{{ route('post.input') }}">投稿</a></div>
                <div class="">
                    <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
                    <input type="submit" value="検索" form="postSearchRequest">
                </div>
                <input type="submit" name="like_posts" class="category_btn" value="いいねした投稿" form="postSearchRequest">
                <input type="submit" name="my_posts" class="category_btn" value="自分の投稿" form="postSearchRequest">
                <ul>
                    @foreach ($categories as $category)
                        <li class="main_categories" category_id="{{ $category->id }}">
                            <span>{{ $category->main_category }}<span>
                        </li>
                    @endforeach
                </ul>
                <ul>
                    @foreach ($sub_categories as $subCategory)
                        <li class="sub_categories_name " sub_category_id="{{ $subCategory->id }}"
                            main_category_id="{{ $subCategory->main_category_id }}">
                            <a class="category_btn"
                                href="{{ route('post.show', ['category_word' => $subCategory->sub_category]) }}">
                                {{ $subCategory->sub_category }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
    </div>
@endsection
