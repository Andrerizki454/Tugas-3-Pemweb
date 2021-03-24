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
        <input class="username" type="text" placeholder="Masukkan Username" name="username" /><br><br>
    <label for="message"><b>Message</b></label><br>
         <input class="message" type="text" placeholder="Masukkan pesan anda" name="message" />
    <br><br>
    <input class="button" type="submit" value="Kirim Pesan" name="submit"/>
</form>
</div>
<script>
    function submitchat(){
		if($('#message').val()=='') return false;
		$.ajax({
			data:{chat:$('#message').val(),ajaxsend:true},
			method:'post',
			success:function(data){
				$('#result').html(data); // Get the chat records and add it to result div
				$('#message').val(''); //Clear chat box after successful submition

				document.getElementById('result').scrollTop=document.getElementById('result').scrollHeight; // Bring the scrollbar to bottom of the chat resultbox in case of long chatbox
			}
		})
		return false;
};
</script>
<?php
if(isset($_POST['submit'])){
	// Code to save and send chat
	$chat = fopen("chat.txt", "a");
	$data="<b>".$_SESSION['username'].':</b> '.$_POST['message']."<br>";
	fwrite($chat,$data);
	fclose($chat);

	$chat = fopen("chat.txt", "r");
	echo fread($chat,filesize("chat.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxget'])){
	// Code to send chat history to the user
	$chat = fopen("chat.txt", "r");
	echo fread($chat,filesize("chat.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxclear'])){
	// Code to clear chat history
	$chat = fopen("chat.txt", "w");
	$data="cleared chat<br>";
	fwrite($chat,$data);
	fclose($chat);
}
?>
</body>
</html>