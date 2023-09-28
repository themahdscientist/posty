@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 rounded-lg bg-white p-6">
            @if (session('status'))
                <div class="mb-3 rounded-lg bg-green-500 w-4/12 translate-x-6 p-3 text-center font-medium text-white">
                    {{ session('status') }}
                </div>
            @endif
            @guest
                <div class="mb-1 p-3 text-center font-bold italic">
                    <a href="{{ route('login') }}" class="rounded bg-green-500 p-2 text-white">Login</a> or <a href="{{ route('register') }}"
                        class="rounded bg-blue-500 p-2 text-white">Register</a> to create posts
                </div>
            @endguest
            @auth

                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4"
                            class="@error('body') border-red-500 @enderror w-full rounded-lg border-2 bg-gray-100 p-4"
                            placeholder="Post something awesome!"></textarea>
                        @error('body')
                            <div class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="rounded bg-blue-500 px-4 py-2 font-medium text-white">Post</button>
                    </div>
                </form>
            @endauth
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <em>There are no posts</em>
            @endif
        </div>
    </div>
@endsection
