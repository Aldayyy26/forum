@extends('../layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p class="text-muted">
            Posted by <strong>{{ $post->user->name }}</strong> on
            <span class="post-date">
                {{ $post->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}
            </span>
        </p>

        <hr>

        <h2>Komentar</h2>
        @forelse ($post->comments as $comment)
            <div class="comment mb-3 p-3 border rounded">
                <div class="comment-header mb-2">
                    <strong>{{ $comment->user->name }}</strong>
                    <span class="text-muted float-end">
                        {{ $comment->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}
                    </span>
                </div>
                <p>{{ $comment->body }}</p>
            </div>
        @empty
            <p>Tidak ada komentar untuk postingan ini.</p>
        @endforelse

        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="comment-body">Tulis komentar:</label>
                <textarea id="comment-body" name="body" class="form-control" rows="4" placeholder="Tulis komentar di sini..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Kirim Komentar</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">Kembali</a> <!-- Tombol Kembali -->
    </div>
@endsection

@section('styles')
    <style>
        .post-date {
            color: #6c757d; /* Warna abu-abu untuk tanggal dan jam */
            font-style: italic; /* Menjadikan tanggal miring */
        }

        .comment {
            background-color: #f8f9fa; /* Background color for comment */
        }

        .comment-header {
            border-bottom: 1px solid #dee2e6; /* Border for comment header */
        }

        .comment-header strong {
            color: #343a40; /* Dark color for commenter's name */
        }

        .comment-header span {
            font-size: 0.875rem; /* Slightly smaller font size for the timestamp */
        }

        textarea.form-control {
            resize: vertical; /* Allow vertical resizing only */
        }

        .btn-secondary {
            background-color: #6c757d; /* Color for the back button */
            border: none; /* Remove default border */
            border-radius: 0.25rem; /* Rounded corners for the button */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Darker color on hover */
            cursor: pointer; /* Pointer cursor on hover */
        }
    </style>
@endsection
