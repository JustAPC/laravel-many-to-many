@extends('layouts.app')

@section('content')
    <div class="col-6 mx-auto pt-5">
        <form action="{{ route('user.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="media align-middle">
                <div>
                    <img src="{{ $post->image }}" class="mr-3 d-block" alt="...">
                    <div class="mt-3">
                        <p>Image URL:</p>
                        <input type="url" value="{{ $post->image }}">
                    </div>
                </div>
                <div class="media-body">
                    <div>
                        <label for="title" class="mr-5 fs-5">Title:</label>
                        <input type="text" value="{{ $post->title }}" id="title" name="title" class="ml-5">
                    </div>
                    <div class="formfield">
                        <label for="content" class="mr-3 fs-5">Post Content:</label>
                        <textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                    </div>
                </div>

                <div class="media-body col-2">
                    <p class="pt-5">Categories:</p>
                    @foreach ($categories as $category)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="category-{{ $category->id }}"
                                value="{{ $category->id }}" name="categories[]"
                                @if (in_array($category->id, old('categories', $selectedCategories))) checked @endif>
                            <label for="category-{{ $category->id }}"
                                class="form-check-label">{{ $category->label }}</label>
                        </div>
                    @endforeach

                    <p class="pt-5">Tags:</p>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="tag-{{ $tag->id }}"
                                value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', $selectedTags))) checked @endif>
                            <label for="tag-{{ $tag->id }}" class="form-check-label"
                                style="color: {{ $tag->color }}">{{ $tag->label }}</label>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="pt-5 text-center">
                <button type="submit" class="btn btn-success fs-4">Save</button>
            </div>
        </form>
    </div>
@endsection
