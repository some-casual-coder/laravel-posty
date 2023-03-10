@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold"> {{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm"> {{ $post->created_at->diffForHumans() }} </span>
    <p class="mb-2">{{ $post->body }}</p>


    @can('delete', $post)
    <form action="{{ route('posts.destroy', $post) }}" method="post">
        @csrf
        <!-- method spoofing -->
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete Post</button>
    </form>
    @endcan

    <div class="flex items-center">

        @auth

        @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.likes', $post) }}" method="post">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        <form action="{{ route('posts.likes', $post) }}" method="post">
            @csrf
            <!-- method spoofing -->
            @method('DELETE')
            <button type="submit" class="text-blue-500">Dislike</button>
        </form>
        @endif

        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>