@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Create News</h2>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-bold mb-2">Judul</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="judul" name="judul" required>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700 font-bold mb-2">Tanggal</label>
                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="tanggal" name="tanggal" required>
            </div>
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
            <input type="hidden" id="cropped_image" name="cropped_image">
            <div class="mb-4">
                <label for="isi" class="block text-gray-700 font-bold mb-2">Isi</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="summernote" name="isi" rows="5" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
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

        // Event listener untuk input file
        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            // Mengatur gambar yang dipilih sebagai sumber gambar
            reader.onload = function (event) {
                imagePreview.src = event.target.result;

                // Tampilkan area crop dan inisialisasi Cropper.js
                cropContainer.classList.remove('hidden');
                cropper = new Cropper(imagePreview, {
                    aspectRatio: 16/9, // Rasio aspek gambar (contoh: 1:1 untuk persegi)
                    viewMode: 2, // Mode tampilan untuk mengontrol tampilan gambar
                    autoCropArea: 1, // Area cropping otomatis saat gambar dimuat
                    crop(event) {
                        // Tangkap data URL hasil cropping
                        const canvas = cropper.getCroppedCanvas();
                        const croppedImage = canvas.toDataURL();
                        // Simpan hasil cropping di dalam hidden input
                        document.getElementById('cropped_image').value = croppedImage;
                    },
                });
            };

            // Membaca file sebagai data URL
            reader.readAsDataURL(file);
        });

        // Event listener untuk tombol crop
        cropButton.addEventListener('click', function () {
            // Simpan hasil cropping ke server jika dibutuhkan
            // Misalnya, dengan AJAX atau memasukkan hasil ke dalam form
            cropper.getCroppedCanvas().toBlob((blob) => {
                const formData = new FormData();
                formData.append('cropped_image', blob);
                // Kirim data hasil cropping ke server jika dibutuhkan
                // Contoh: fetch('upload.php', { method: 'POST', body: formData });
                
                // Sembunyikan area crop dan hapus preview gambar
                cropContainer.classList.add('hidden');
                imagePreview.src = '';
                
                // Ganti isi input file dengan hasil cropping
                const fileInput = document.getElementById('foto');
                fileInput.files = [new File([blob], 'cropped_image.png', { type: 'image/png' })];
            });
        });
    });
</script>
@endsection
