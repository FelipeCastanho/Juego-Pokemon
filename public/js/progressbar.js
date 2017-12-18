$(document).ready(function(){
	var x = 1;
	$('#progress-bar').hide();
	function bar(){
		$("#registro").click(function(){
			var nick = document.getElementById("nickname").value;
			var pass = document.getElementById("password").value;
			if (nick.length >= 4 && pass.length >= 4 && nick.length <= 10 && pass.length <= 15) {
				$("#progress-bar").show();
				progress(x);
			}
		});
		$("#guardar").click(function(){
			$("#progress-bar").show();
			progress(x);
		});
	}
	
	function progress(){
		document.getElementById("barra").style.width = x +"%";
		x += 2;
	}
	setInterval(bar, 95);
});