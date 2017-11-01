$(document).ready(function(){


	$("#register-form").on("submit", function(e){
		e.stopPropagation();
		e.preventDefault();
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
				var str = "";
				console.log(response);
				for(var i = 0; i < response.length; i++){
					if(response[i] == "email_error"){
						str += "<span style='color:red;'>*Please enter a valid email address<span><br>";
					}
					if(response[i] == "password_error"){
						str += "<span style='color:red;'>*Make sure passwords match<span><br>";
					}
					if(response[i] == "empty_error"){
						str += "<span style='color:red;'>*Please fill in all fields<span><br>";
					}
					if(response[i] == "username_exists_error"){
						str += "<span style='color:red;'>*Username already exists<span><br>";
					}
					if(response[i] == "connection_error"){
						str += "<span style='color:green;'><span><br>";
					}
					if(response[i] == "success"){
						str += "<span style='color:green;'>Succesfully Registered<span><br>";
						window.href = "https://spat.liveapp.ca";
					}
				}
				document.getElementById("message").innerHTML = str;
			}
		})
		return false;
	});
		
})