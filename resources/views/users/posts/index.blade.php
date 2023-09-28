@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="mb-3">
                <h1 class="p-4 text-2xl font-medium">{{ $user->name }}</h1>
                <p>Shared {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
            </div>

            <div class="rounded-lg bg-white p-6">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <em>{{ $user->name }} does not have any posts</em>
                @endif
            </div>
        </div>
    </div>
@endsection
