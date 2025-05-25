document.addEventListener("DOMContentLoaded", function() {
    var imageElement = document.getElementById("image");
    if (imageElement !== null) {
        imageElement.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "svg" ||
                    ext == "jpg" || ext == "webp" || ext == "avif")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("imageResult").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }

});
