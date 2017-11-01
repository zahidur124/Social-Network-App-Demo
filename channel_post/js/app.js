$(document).ready(function(){
	$("#video").on('click', function(){
			
		$(".record-video").css("display", "block");
		$(".record-audio").css("display", "none");
		$(".record-image").css("display", "none");
	});
	$("#picture").on('click', function(){
			
		$(".record-image").css("display", "block");
		$(".record-audio").css("display", "none");
		$(".record-video").css("display", "none");
	});
	$("#audio").on('click', function(){
		$(".record-audio").css("display", "block");
		$(".record-video").css("display", "none");
		$(".record-image").css("display", "none");
	});
	///////////////////////////////////////////////////////////////////////////////
	///////////////////////////IMAGE UPLOAD FUNCTIONALITY//////////////////////////
	///////////////////////////////////////////////////////////////////////////////
	function readURL(input){
		if (input.files && input.files[0]) {
			
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('.image-preview').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#fileToUpload").change(function(){
		readURL(this);
	});
	$("#uploadImage").on("submit", function(e){

		var that = $(this),
		url = that.attr("action"),
		type = that.attr("method"),
		data = {};
		that.find('[name]').each(function(index,value){
			var that = $(this),
			name = that.attr("name"),
			value = that.val();
			data[name] = value;
		});
		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				console.log(response);
				var str ="";
				for(var i = 0; i < response.length; i++){
					if(response[i] == "error"){
						str = "<h6 style='color:red;'>There was an issue uploading the file</h6>";
					}
					if(response[i] == "success"){
						str = "<h6 style='color:green;>File was uploaded successfully</h6>";
					}
				}
				document.getElementById('msg').innerHTML = str;
			}
		});
	});
	//-----------------------------------------------------------------------------------
	//
	//
	//							Functionality for the video upload
	//
	//
	//-----------------------------------------------------------------------------------
		/*iphone video upload */
		$(".save-button").on("click", function(){
			var file = $("#cameraInput")[0].files[0];
			var fileType = 'video'; // or "audio"
			var fileName = file.name;  // or "wav"
			var formData = new FormData();
			formData.append(fileType + '-filename', fileName);
			formData.append(fileType + '-blob', file);

			xhr('upload.php?q=video', formData, function (fName) {
				console.log(fName);
				console.log("upload starting");
		    	//window.open(location.href + fName);
			});
		});


/*$("#uploadImage").on('click', function(){

	
	var fileType = "image";
	var reader = $(".image-preview");
 	var dataURL = reader[0].src;
 	xhr('upload.php?q='+fileType+'', {"data" : dataURL}, function (fName) {
		console.log(fName);
		console.log("upload starting");
	});
 	//console.log(dataURL);
		$.ajax({
		  type: "POST",
		  url: "upload.php?q="+fileType,
		  data: { 
		     "data": dataURL
		  }
		}).done(function(response) {
		  console.log(response); 
		});
 	var fileType = 'image'; // or "audio"
	var fileName = file.name;  // or "wav"
	var formData = new FormData();
	formData.append(fileType + '-filename', fileName);
	formData.append(fileType + '-image', file);
	console.log(formData);*/
	/*xhr('upload.php?q='+fileType+'', formData, function (fName) {
		console.log(fName);
		console.log("upload starting");
	});

})*/
	function xhr(url, data, callback) {
	    var request = new XMLHttpRequest();
	    request.onreadystatechange = function () {
	        if (request.readyState == 4 && request.status == 200) {
	            callback(location.href + request.responseText);
	        }
	    };
	    request.open('POST', url);
	    request.send(data);

	}



/*	var errorCallback = function(e) {
	console.log('Failed to get webcam', e);
	};
	//Does the user have browser support for this api
	function hasGetUserMedia(){
		return !!(navigator.getUserMedia  = navigator.getUserMedia ||
		                          navigator.webkitGetUserMedia ||
		                          navigator.mozGetUserMedia ||
		                          navigator.msGetUserMedia);
	}
	if(isMobile.apple.device){

	}
	else{
		if(hasGetUserMedia()){

		}
		else{
			alert('getUserMedia() is not supported in your browser');
		}
	}

	var blob;

	var recorder; 
	var video = document.querySelector('video');
	var options = {
	    mimeType: 'video/webm', // audio/ogg or video/webm
	    audioBitsPerSecond : 128000,
	    videoBitsPerSecond : 2500000,
	    bitsPerSecond: 2500000  // if this is provided, skip above two
	}
	//Start Recording video
	$(".record-button").on('click', function(){
		console.log("starting");
		recorder.record();
		setTimeout(stopRecording, 10000);
	})
	var theBlob;
	//Stop Recording video
	function stopRecording(){
		console.log("stopping..");
		recorder.stop(function(blob) {
			theBlob = blob;
	    	video.src = URL.createObjectURL(blob);
	    	
		});

	}

	function xhr(url, data, callback) {
	    var request = new XMLHttpRequest();
	    request.onreadystatechange = function () {
	        if (request.readyState == 4 && request.status == 200) {
	            callback(location.href + request.responseText);
	        }
	    };
	    request.open('POST', url);
	    request.send(data);

	}

	$(".save-button").on("click", function(){
		var fileType = 'video'; // or "audio"
		var fileName = $("#fname").val() + ".webm";  // or "wav"
		var formData = new FormData();
		formData.append(fileType + '-filename', fileName);
		formData.append(fileType + '-blob', theBlob);

		xhr('upload.php', formData, function (fName) {
			console.log(fName);
			console.log("upload starting");
	    	//window.open(location.href + fName);
		});

	});*/
	/*iphone video upload */
	/*$(".iphone-save-button").on("click", function(){
		var file = $("#cameraInput")[0].files[0];
		var fileType = 'video'; // or "audio"
		var fileName = file.name;  // or "wav"
		var formData = new FormData();
		formData.append(fileType + '-filename', fileName);
		formData.append(fileType + '-blob', file);

		xhr('upload.php', formData, function (fName) {
			console.log(fName);
			console.log("upload starting");
	    	//window.open(location.href + fName);
		});
	});*/

	$("#textfont").on("change", function(){
		var color = $(this).val();
		$('#comment-section').css("color", color);
	});
	$("#backgroundText").on("change", function(){
		var color = $(this).val();
		$('#comment-section').css("background-color", color);
	})

	//////////////////////////////////////////////////////////////////
	//																//
	//Button clicks for posting a post i.e video, picture or audio  //
	//																//
	//////////////////////////////////////////////////////////////////
	/*$("#video").on('click', function(){
		console.log("clicked");
	$(".record-video").css("display", "block");
	if( isMobile.apple.device){

	}
	else{

		if (navigator.getUserMedia) {
			 navigator.getUserMedia({audio: true, video: true}, function(stream) {
			    video.src = window.URL.createObjectURL(stream);
				video.play
			}, errorCallback);

			}
		}
	});
	
	var canvas;
	var context;
	var media;

	if(!isMobile.apple.device){
		 canvas = document.getElementById("canvas");
		 context = canvas.getContext("2d");
		 media = document.getElementById("media");
	}
	$("#picture").on('click', function(){

		$(".record-video").css("display", "none");
		$(".record-image").css("display", "block");

		if( isMobile.apple.device){

		} else {
			if (navigator.getUserMedia) {
			 	navigator.getUserMedia({video: true}, function(stream) {
			    	media.src = window.URL.createObjectURL(stream);
					media.play();
				}, errorCallback);

			}
		}
	})
	$(".snap-button").on("click", function(){
		
		context.drawImage(media, 0, 0, 640, 480);

	});
	$(".save-image-button").on("click", function(){
		var dataURL = canvas.toDataURL('image/png');
		$.ajax({
		  type: "POST",
		  url: "uploadImage.php",
		  data: { 
		     "data": dataURL
		  }
		}).done(function(o) {
		  console.log('saved'); 
		});
	})

	$("#uploadImage").on('click', function(e){

		e.preventDefault();
		e.stopPropagation();
		var fd = new FormData();

    	var file = document.getElementById("fileToUpload").files[0];
    	var filename = file.name;
    	var fileType = file.type;

    	fd.append(fileType + "-filename", filename);
    	console.log(filename);
    	fd.append("hello", "wierdo");
    	fd.append(fileType + "-img", file);
		console.log(fileType);
		console.log(fd);
		xhr('uploadiImage.php', fd, function (fName) {
			console.log(fName);
			console.log("upload starting");
	    	//window.open(location.href + fName);
		});


	})*/

})
