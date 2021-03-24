<!DOCTYPE html>
<html>
<head>
<title>AJAX Chat App</title>
<link rel="stylesheet" type="text/css" href="chat.css"/>
</head>
<body>
<div class="box">
    <textarea id="chat" rows="20" cols="31"></textarea><br><br>
<form method="post" action="chat.php">
    <label for="username"><b>Username</b></label><br>
        <input class="username" type="text" placeholder="Masukkan Username" id="username" /><br><br>
    <label for="message"><b>Message</b></label><br>
         <input class="message" type="text" placeholder="Masukkan pesan anda" id="pesan" />
</form>
</div>
<script>
	const chat = document.querySelector('#chat');
	const message = document.querySelector('#pesan');
	const name = document.querySelector('#username');
	const baseUrl = 'https://filkomandrerh.000webhostapp.com/';
	function readChat() {
		fetch(`${baseUrl}/chat-read.php`)
			.then(res => res.text())
			.then(res => {
				chat.value = res;
			});
		setTimeout(readChat, 1000);
	}
	readChat();
	message.addEventListener('keyup', e => {
		if (e.keyCode === 13) {
			var form = new FormData()
			form.append("name", name.value)
			form.append("message", message.value)
			fetch(`${baseUrl}/chat-write.php`, {
				method: 'post',
				headers: {
					'Content.type': 'application/x-www-form-urlenconded',
				},
				body: form
			});
			name.value = '';
			message.value = '';
		}
	});
</script>
</body>
</html>