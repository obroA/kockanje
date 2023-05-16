<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Roll the dice</title>
</head>
<body>
	<div id="naslov">Cas<a onclick="credits()">i</a>no</div>
	<div id="meni">
		<form action="game.php" method="post">
			<div id="igralec1" class="igralec">
				<div class="igralecNas">1</div>				
				<input id="igralec0" autocomplete="off" maxlength='11' type="text" class="igralecInput" name="userOne" required placeholder="Player1"></input>
			</div>
			<div id="igralec2" class="igralec">
				<div class="igralecNas">2</div>
				<input id="igralecEna" autocomplete="off" maxlength='11' type="text" class="igralecInput" name="userTwo" required placeholder="Player2"></input>
			</div>
			<div id="igralec3" class="igralec">
				<div class="igralecNas">3</div>
				<input id="igralecDva" autocomplete="off" maxlength='11' type="text" class="igralecInput" name="userThree" required placeholder="Player3"></input>
			</div>
			<input type="submit" id="submit" value="START"></input>
		</form>
	</div>
	<script src="scripts/input.js"></script>
	<script> 
	function credits(){
		Swal.fire(
			'The Internet?',
			'That thing is still around?',
			'question'
		)
	}

	</script>
</body>

</html>