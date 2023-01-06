@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12">

        <div class="p-6">
            <h1>{{ $user->name }}</h1>
            <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
            <p>Received {{ $user->receivedLikes }} likes</p>
        </div>
        @if ($posts->count())
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach

        {{ $posts->links() }}
        @else
        <p>{{ $user->name }} has no posts</p>
        @endif
    </div>
</div>
@endsection