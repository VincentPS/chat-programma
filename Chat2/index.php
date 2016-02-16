<!DOCTYPE html>
<html>
	<head>
		<title>Chatbox</title>
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	</head>

	
	<body>
		
		<div class="webcam">
			<video width="320" height="240" autoplay></video>
			
			<script>
			var errorCallback = function(e) {
				console.log('Reeeejected!', e);
			  };
				navigator.getUserMedia  = navigator.getUserMedia ||
							  navigator.webkitGetUserMedia ||
							  navigator.mozGetUserMedia ||
							  navigator.msGetUserMedia;

					var video = document.querySelector('video');

					if (navigator.getUserMedia) {
					  navigator.getUserMedia({audio: true, video: true}, function(stream) {
						video.src = window.URL.createObjectURL(stream);
					  }, errorCallback);
					} else {
					  video.src = 'somevideo.webm'; // fallback.
					}
			
			</script>
		</div>
		
		<div class="chatbox">
			
		</div>
		
		<div class="verzenden">
			<input type="text" name="bericht" id="box" class="berichten" value="">
			<button id="add-message">send</button>
		</div>
	</body>
</html>
	<script>
	
	function showMessages(result){
		$('.chatbox').html(result);
	}
	
	function getMessages(){
		$.ajax({type: "GET",
				url: "require/foreach.php",
				success: showMessages
			}
		);
	}
	setInterval(getMessages,100);
	
	
	function addMessage(){
		var message = $('input[name=bericht]').val();
		console.log(message);
		$('#box').val("");
		$.ajax({type: "POST",
				url: "require/addmessage.php",
				data: 'bericht='+message,
			}
		);
	}
	$(function(){
		$('#add-message').click(addMessage);
		$('.berichten').keypress(function (e) {
			if (e.keyCode == 13)
				addMessage()
		});
		
		
		
	});
		
	
	</script>