<?php
	session_start();
	if(isset($_POST["score"])){
		$_SESSION["score"] = $_POST["score"];
	}
	if(isset($_POST["scoreTwo"])){
		$_SESSION["scoreTwo"] = $_POST["scoreTwo"];
	}
	if(isset($_POST["scoreThree"])){
		$_SESSION["scoreThree"] = $_POST["scoreThree"];
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="photos/favicon.png" type="img/png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Gambling Room</title>
</head>
<body>
	<div id="naslov">Results</div>
	<div id="menu">				
		<div id="second" class="winners">
			<div class="number" id="numberTwo" >2</div><br />
			<div class="name" id="secondPlayer"></div>
			<div class="name" id="secondScore"></div>
		</div>
		<div id="first" class="winners">
			<div class="number" id="numberOne" >1</div><br />
			<div class="name" id="firstPlayer"></div>
			<div class="name" id="firstScore"></div>
		</div>
		<div id="third" class="winners">
			<div class="number" id="numberThree" >3</div><br />
			<div class="name" id="thirdPlayer"></div>
			<div class="name" id="thirdScore"></div>
		</div>
	</div>
	
	<script>
	var numberOne = document.getElementById("numberOne");
	var numberTwo = document.getElementById("numberTwo");
	var numberThree = document.getElementById("numberThree");
	var second = document.getElementById("second");
	var third = document.getElementById("third");
	var secondPlayer = document.getElementById("secondPlayer");
	var thirdPlayer = document.getElementById("thirdPlayer");
	var secondScore = document.getElementById("secondScore");
	var thirdScore = document.getElementById("thirdScore");

	const scores = [
		[<?php echo $_SESSION["score"]?>, "<?php echo $_SESSION["userOne"]; ?>"],
		[<?php echo $_SESSION["scoreTwo"]?>, "<?php echo $_SESSION["userTwo"]; ?>"],
		[<?php echo $_SESSION["scoreThree"]?>, "<?php echo $_SESSION["userThree"]; ?>"]
	];
	
	scores.sort(function(a,b){
		return b[0]-a[0];
	});
		
	document.getElementById("firstScore").innerHTML = scores[0][0];
	secondScore.innerHTML = scores[1][0];
	thirdScore.innerHTML = scores[2][0];
	document.getElementById("firstPlayer").innerHTML = scores[0][1];
	secondPlayer.innerHTML = scores[1][1];
	thirdPlayer.innerHTML = scores[2][1];
	
	if(scores[0][0] == scores[1][0]){
		if(scores[0][0] == scores[2][0]){
			numberTwo.innerHTML = 1;
			second.style.height = "80%";
			second.style.top = "20%";
			secondPlayer.style.top = "20%";
			secondScore.style.top = "30%";
			numberThree.innerHTML = 1;
			third.style.height = "80%";
			third.style.top = "20%";
			thirdPlayer.style.top = "20%";
			thirdScore.style.top = "30%";
		}
		else{
			numberTwo.innerHTML = 1;
			second.style.height = "80%";
			second.style.top = "20%";
			secondPlayer.style.top = "20%";
			secondScore.style.top = "30%";
			numberThree.innerHTML = 2;
			third.style.height = "50%";
			third.style.top = "50%";
			thirdPlayer.style.top = "30%";
			thirdScore.style.top = "45%";
		}
	}
	else if(scores[1][0] == scores[2][0]){
		numberThree.innerHTML = 2;
		third.style.height = "50%";
		third.style.top = "50%";
		thirdPlayer.style.top = "30%";
		thirdScore.style.top = "45%";
	}
</script>
</body>

</html>