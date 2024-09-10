@extends('../layouts.master')

@section('content')
    <div class="container">
        <h1>Forum</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Buat Post Baru</a>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                    <p>{{ $post->body }}</p>
                    <p>Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</p>
                    <p>Comments: {{ $post->comments->count() }}</p> <!-- Menampilkan jumlah komentar -->
                </div>
            </div>
        @endforeach
    </div>
@endsection
