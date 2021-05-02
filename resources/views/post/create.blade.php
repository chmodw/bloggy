@extends('layouts.app')

@section('content')

    <form class="w-full font-sans align-middle" action="{{route('post.store')}}" method="post">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full my-2">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="title">
                    Post Title
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('title') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="title"
                       name="title"
                       type="text"
                       placeholder="Post title here..."
                       value="{{ old('title') }}"
                >
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full my-2">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="body">
                    Body
                </label>
                <textarea
                    id="body"
                    name="body"
                    placeholder="Post content here..."
                    class="appearance-none block w-full h-40 bg-gray-200 text-gray-700 border @error('body') border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                >{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full my-2 tags">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="body">
                    Tags
                </label>
                <span class="text-sm text-gray-500">Please select a tag</span>
                <div class="grid grid-cols-5 gap-2">

                    @foreach($tags as $tag)
                        <label class="flex items-center">
                            <input
                                type="checkbox"
                                class="form-checkbox"
                                name="tags[]"
                                value="{{ $tag->id }}"
                                @if (old('tags') && in_array($tag->id, old('tags'))) checked @endif
                            >
                            <span class="ml-2">{{ $tag->name }}</span>
                        </label>
                    @endforeach

                    @error('tags')
                    <p class="text-red-500 text-xs italic">The selected tags are invalid.</p>
                    @enderror
                </div>
                <span class="text-sm text-gray-500 py-2">Or type tags separated by a comma.</span>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                       id="tag_text"
                       name="tag_text"
                       type="text"
                       placeholder="Extra tags here..."
                       value="{{old('tag_text')}}"
                >
            </div>

            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Save
            </button>

        </div>
    </form>

@endsection
