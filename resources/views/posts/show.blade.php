@extends('../layouts.master')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p>Posted by {{ $post->user->name }}</p>

        <hr>

        <h2>Komentar</h2>
        @foreach ($post->comments as $comment)
            <div>
                <p>{{ $comment->body }}</p>
                <p>Commented by {{ $comment->user->name }}</p>
            </div>
        @endforeach

        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <textarea name="body"></textarea>
            <button type="submit">Kirim Komentar</button>
        </form>
    </div>
@endsection
