<!DOCTYPE html>
<html>
	<?php 
	$title = "Обратная связь";
	require_once "BLOCKS/head.php" 
	?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> 
$(document).ready (function () { 
$("#done").click (function () { 
 $('#messageShow').hide (); 
 var name = $("#name").val (); 
 var email = $("#email").val (); 
 var subject = $("#subject").val (); 
 var message = $("#message").val (); 
 var fail = ""; 
 if (name.length < 3) fail = "Имя не меньше 3 символов"; 
 else if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0) 
	 fail = "Вы ввели некорректный адрес эл. почты"; 
 else if (subject.length < 5) 
	 fail = "Слишком маленькая тема,минимум 5 символов"; 
 else if (message.length < 25) 
	 fail = "Слишком маленькое сообщение,минимум 25 "; 
 if (fail != "") { 
	$('#messageShow').html (fail + "<div class='clear'><br></div>"); 
	$('#messageShow').show (); 
 return false; 
 } 
 $.ajax ({ 
	url: 'ajax/feedback.php', 
	type: 'POST', 
	cache: false, 
	data: {'name': name, 'email': email, 'subject': subject, 'message': message}, 
	dataType: 'html',
	success: function (data) { 
		$('#messageShow').html (data + "<div class='clear'><br></div>"); 
		$('#messageShow').show (); 
		} }); }); }); 
	</script>﻿
</head>
<body>
	<?php require_once "BLOCKS/header.php" ?>
	<div id="wrapper">
		<div id="leftCol">
			<input type="text" placeholder="Имя" id="name" name="name"><br/>
			<input type="text" placeholder="Email" id="email" name="email"><br/>
			<input type="text" placeholder="Тема сообщения" id="subject" name="subject"><br/>
			<textarea name="messege"  id="message" placeholder="Введите сюда ваше сообщение"></textarea><br/>
			<div id="messageShow"></div>
			<input type="button" name="done" id="done" value="Отправить">
			
	</div>	
		<?php require_once "BLOCKS/rightCol.php" ?>
	</div>
	<?php require_once "BLOCKS/footer.php" ?>
</body>
</html>