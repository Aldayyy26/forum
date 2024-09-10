@extends('../layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Forum</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">Buat Post Baru</a>

        @foreach ($posts as $post)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->body }}</p>
                    <p class="text-muted">
                        Posted by <strong>{{ $post->user->name }}</strong> on
                        <span class="post-date">
                            {{ $post->created_at->setTimezone('Asia/Jakarta')->format('l, d M Y H:i') }}
                        </span>
                    </p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary">
                        Comments: {{ $post->comments->count() }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
    <style>
        .post-date {
            color: #6c757d; /* Warna abu-abu untuk tanggal dan jam */
            font-style: italic; /* Menjadikan tanggal miring */
        }

        .card-body p {
            margin-bottom: 1rem; /* Menambahkan jarak antara paragraf */
        }

        .card {
            border: 1px solid #dee2e6; /* Border ringan untuk card */
            border-radius: 0.5rem; /* Sudut membulat */
            background-color: #ffffff; /* Background putih */
        }

        .card-title {
            font-size: 1.5rem; /* Ukuran font untuk judul card */
            margin-bottom: 0.5rem; /* Jarak bawah untuk judul card */
        }

        .card-text {
            font-size: 1rem; /* Ukuran font untuk isi card */
        }

        .btn-outline-secondary {
            border-color: #6c757d; /* Warna border untuk tombol outline */
            color: #6c757d; /* Warna teks untuk tombol outline */
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d; /* Warna background saat hover */
            color: #ffffff; /* Warna teks saat hover */
        }
    </style>
@endsection
