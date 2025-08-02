@extends('admin.layout')
@section('content')

<div class="w-full p-6 bg-gray-100 min-h-screen">
    <div class="w-full  bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-blue-300 p-4">
            <h2 class="text-xl font-bold text-blue-800">Buat FAQ</h2>
        </div>

        <form method="POST" action="{{ route('faq.store') }}" class="p-6">
            @csrf

            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul FAQ</label>
                <input type="text" name="judul" placeholder="Masukkan judul" id="judul" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('judul') }}" required>

                    <p class="text-red-500 text-sm mt-1"></p>

            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-black font-medium mb-2">Deskripsi FAQ</label>
                <div id="editor" class="w-full px-4 py-2 border rounded-lg bg-white" contenteditable="true">
                    {!! old('deskripsi') !!}
                </div>
                <input type="hidden" name="deskripsi" id="hiddenDeskripsi">


                    <p class="text-red-500 text-sm mt-1"></p>

            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="terms" class="form-checkbox h-5 w-5 text-blue-300" required>
                    <span class="ml-2 text-gray-700">Saya Sebagai Admin</span>
                </label>

                    <p class="text-red-500 text-sm mt-1"></p>

            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-6 py-2 bg-blue-300 hover:bg-blue-400 text-blue-800 font-medium rounded-lg">Daftar</button>

            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/inline/ckeditor.js"></script>
<script>
    let editor;
    InlineEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'link', '|',
                'undo', 'redo'
            ]
        })
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    // Saat submit form, isi hidden input dengan HTML editor
    document.querySelector('form').addEventListener('submit', function (e) {
        document.querySelector('#hiddenDeskripsi').value = editor.getData();
    });
</script>


@endsection
