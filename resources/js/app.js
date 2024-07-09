import './bootstrap';
import Cropper from 'cropperjs';

document.addEventListener('DOMContentLoaded', function () {
    var image = document.getElementById('foto');

    if (image) {
        var cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            crop: function(event) {
                var preview = document.getElementById('image-preview');
                preview.innerHTML = '';
                var img = document.createElement('img');
                img.src = cropper.getCroppedCanvas().toDataURL();
                img.classList.add('rounded', 'max-w-full', 'h-auto');
                preview.appendChild(img);
            }
        });
    }
});
