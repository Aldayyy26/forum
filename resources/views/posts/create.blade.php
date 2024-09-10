@extends('../layouts.master')

@section('content')
    <div class="container">
        <h1>Buat Post Baru</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Judul</label>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <label for="body">Isi</label>
                <textarea name="body" id="body"></textarea>
            </div>
            <button type="submit">Buat</button>
        </form>
    </div>
@endsection
