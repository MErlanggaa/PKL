@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg">
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h3 class="text-2xl font-semibold text-center mb-4">Add Team</h3>
            <form class="form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="foto" class="block text-gray-700 font-bold mb-2">Thumbnail Foto</label>
                    <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="foto" name="foto" accept="image/*" required>
                </div>
                <div class="mb-4 hidden" id="crop-container">
                    <label class="block text-gray-700 font-bold mb-2">Preview & Crop</label>
                    <div>
                        <img id="image-preview" class="rounded-lg shadow-md mb-4">
                    </div>
                    <button type="button" id="crop-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crop Image</button>
                </div>
                <input type="hidden" id="cropped_image" name="foto">
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="judul" name="judul" required>
                </div>
                <div class="mb-4">
                    <label for="subjudul" class="block text-gray-700 text-sm font-bold mb-2">Subjudul</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subjudul" name="subjudul" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include SweetAlert -->
@include('sweetalert::alert')

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/cropperjs"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('foto');
        const imagePreview = document.getElementById('image-preview');
        const cropContainer = document.getElementById('crop-container');
        const cropButton = document.getElementById('crop-button');
        let cropper;

        // Event listener for file input change
        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function (event) {
                imagePreview.src = event.target.result;
                cropContainer.classList.remove('hidden');
                cropper = new Cropper(imagePreview, {
                    aspectRatio: 16 / 9,
                    viewMode: 2,
                    autoCropArea: 1,
                });
            };

            reader.readAsDataURL(file);
        });

        // Event listener for crop button
        cropButton.addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas();
            const croppedImage = canvas.toDataURL('image/png');
            document.getElementById('cropped_image').value = croppedImage;

            cropContainer.classList.add('hidden');
            imagePreview.src = '';
        });
    });
</script>
@endsection
