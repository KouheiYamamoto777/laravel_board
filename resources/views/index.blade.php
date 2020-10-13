@extends('layouts.default')

@section('title', 'Laravel-bbs')

@section('contents')
        <ol>
        @forelse ($posts as $post)
                <li class="post">
                    <span>{{ $post->author }}</span>
                    <span>   << {{ $post->email }} >>   </span>
                    <div>{!! nl2br(e($post->body)) !!}</div><br />
                </li>
        @empty
        </ol>
            <h2>not post yet.</h2>
        @endforelse
@endsection

@section('paginate')
    {{-- <div class="pagination">
        {{ $posts->links() }}
    </div> --}}
@endsection

@section('form')
    <h3>New Post</h3>
    <form action="{{ url('/') }}" method="post" class="form">
        @csrf
        <p>
            <input type="text" name="author" placeholder="author here" value="{{ old('author') }}">
            @error('author')
                <span class="error">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input type="text" name="email" placeholder="email here" value="{{ old('email') }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <textarea name="body" id="" placeholder="body here">{{ old('body') }}</textarea>
            @error('body')
                <span class="error">{{ $message }}</span>
            @enderror
        </p>
        <input type="submit" value="add post">
    </form>
@endsection
