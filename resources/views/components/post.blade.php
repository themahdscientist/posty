@props(['post' => $post])
<div class="mb-4 p-3">
    <div>
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a>
        <span class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
    </div>
    <p class="mb-2">{{ $post->body }}</p>
    @can('delete', $post)
        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        </div>
    @endcan
    @auth
        <div class="flex items-center">
            @if (!$post->likedBy(Auth::user()))
                <form action="{{ route('like', $post) }}" method="post" class="mr-4">
                    @csrf
                    <button type="submit" class="text-md text-blue-500">Like👍</button>
                </form>
            @else
                <form action="{{ route('dislike', $post) }}" method="post" class="mr-4">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-md text-blue-500">Dislike👎</button>
                </form>
            @endif
        </div>
    @endauth
    <div>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</div>
</div>
