
window.onload = function() {

		var fileInput = document.getElementById('fileInput');
		var fileDisplayArea = document.getElementById('fileDisplayArea');


		fileInput.addEventListener('change', function(e) {
			var file = fileInput.files[0];
			var imageType = /image.*/;

			if (file.type.match(imageType)) {
				var reader = new FileReader();

				reader.onload = function(e) {
					fileDisplayArea.innerHTML = "";

					var img = new Image();
					img.src = reader.result;

					fileDisplayArea.appendChild(img);
				}

				reader.readAsDataURL(file);
			} else {
				fileDisplayArea.innerHTML = "File not supported!";
			}
		});

}

function readURL(input) {
		if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
						$('#image_upload_preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
		}
}

$("#inputFile").change(function () {
		readURL(this);
});
