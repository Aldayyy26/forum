@extends('../layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Buat Post Baru</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Isi</label>
                <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">Kembali</a> <!-- Tombol Kembali -->
            <button type="submit" class="btn btn-primary">Buat</button>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .container {
            max-width: 600px; /* Membatasi lebar kontainer form */
        }

        .form-label {
            font-weight: bold; /* Menjadikan label lebih tebal */
        }

        .btn-primary {
            background-color: #007bff; /* Warna biru untuk tombol */
            border: none; /* Menghilangkan border default */
            border-radius: 0.25rem; /* Menambahkan border-radius untuk tombol */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Warna biru gelap saat hover */
            cursor: pointer; /* Menambahkan pointer cursor saat hover */
        }

        .btn-secondary {
            background-color: #6c757d; /* Warna abu-abu untuk tombol kembali */
            border: none; /* Menghilangkan border default */
            border-radius: 0.25rem; /* Menambahkan border-radius untuk tombol */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Warna abu-abu gelap saat hover */
            cursor: pointer; /* Menambahkan pointer cursor saat hover */
        }

        textarea.form-control {
            resize: vertical; /* Mengizinkan hanya resizing vertikal */
        }

        .d-flex {
            display: flex; /* Mengaktifkan flexbox */
        }

        .justify-content-between {
            justify-content: space-between; /* Menyebar tombol ke kedua sisi */
        }
    </style>
@endsection
