@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label><br>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 @error('body') border-red-100 @enderror" placeholder="Post Something"></textarea>

            </div>
            <div>
                <button type="submit" class="bg-blue-500">Post</button>
            </div>
        </form>

        @if ($posts->count())
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach

        {{ $posts->links() }}
        @else
        <p>There are no posts</p>
        @endif
    </div>
</div>
@endsection