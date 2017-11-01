$(document).ready(function(){


	$("#login_form").on("submit", function(e){
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
					if(response[i] == "error"){
						str += "<span style='color:red;'><b>*Please enter the correct credientials</b><span><br>";
						document.getElementById("message").innerHTML = str;
					}
					if(response[i] == "success"){
						str += "<span style='color:green;'><b>*Successfully logged in</b><span><br>";
						document.getElementById("message").innerHTML = str;
						$("#login-page").hide();
						$(".footer").show();
						$(".navbar").show();
						$(".body-container").show();
						$("#profile-page").show();
					}

				}

			}
		})
		return false;
	});

})
