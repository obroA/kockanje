<?php
	session_start();
	$_SESSION["scoreOne"] = 0;
	$_SESSION["scoreTwo"] = 0;
	$_SESSION["scoreThree"] = 0;
	$_SESSION["rollsLeftOne"] = 1;
	$_SESSION["rollsLeftTwo"] = 1;
	$_SESSION["rollsLeftThree"] = 1;
	$_SESSION["userOne"] = $_POST["userOne"];
	$_SESSION["userTwo"] = $_POST["userTwo"];
	$_SESSION["userThree"] = $_POST["userThree"];	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="photos/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Gambling Room</title>
</head>

<body>	
	<div id="naslov">Roll the dice</div>
	<div id="menu">			
		<div id="igralec1" class="playerGame">
				<div class="playerTitle"><?php echo $_SESSION["userOne"]; ?><br /><br></div>	
				<div class="score">Score:</div>
				<div id="scoreOne" class="score">0</div>
				<div class="rollsLeft" id="rollsLeftOne"><?php echo $_SESSION["rollsLeftOne"] ?></div>
				<input id="rollBtnOne" type="submit" class="roll" value="Throw" onclick="rollOne();"></input>
				<canvas id="dicePicOne" class="dicePic" width="50" height="50"></canvas>
				<canvas id="dicePicOne2" class="dicePic" width="50" height="50"></canvas>
				<canvas id="dicePicOne3" class="dicePic" width="50" height="50"></canvas>
		</div>
		
		<div id="igralec2" class="playerGame">
				<div class="playerTitle"><?php echo $_SESSION["userTwo"]; ?><br /><br></div>	
				<div class="score">Score:</div>
				<div id="scoreTwo" class="score">0</div>
				<div class="rollsLeft" id="rollsLeftTwo"><?php echo $_SESSION["rollsLeftTwo"] ?></div>
				<input id="rollBtnTwo" type="submit" class="roll disabled" value="Throw" onclick="rollTwo();" disabled></input>
				<canvas id="dicePicTwo" class="dicePic" width="50" height="50"></canvas>
				<canvas id="dicePicTwo2" class="dicePic" width="50" height="50"></canvas>
				<canvas id="dicePicTwo3" class="dicePic" width="50" height="50"></canvas>
		</div>		
		
		<div id="igralec3" class="playerGame">
				<div class="playerTitle"><?php echo $_SESSION["userThree"]; ?><br /><br></div>	
				<div class="score">Score:</div>
				<div id="scoreThree" class="score">0</div>
				<div class="rollsLeft" id="rollsLeftThree"><?php echo $_SESSION["rollsLeftThree"] ?></div>
				<input id="rollBtnThree" type="submit" class="roll disabled" value="Throw" onclick="rollThree();" disabled></input>
				<canvas id="dicePicThree" class="dicePic" width="50" height="50"></canvas>
				<canvas id="dicePicThree2" class="dicePic" width="50" height="50"></canvas>
				<canvas id="dicePicThree3" class="dicePic" width="50" height="50"></canvas>
		</div>
		
		<form action="results.php">
			<input type="submit" id="results" value="RESULTS" disabled></input>
		</form>
		
	</div>	

	<script>
	var rolls = <?php echo $_SESSION["rollsLeftOne"] ?>;
	var rollsTwo = <?php echo $_SESSION["rollsLeftTwo"] ?>;
	var rollsThree = <?php echo $_SESSION["rollsLeftThree"] ?>;
	
	var rollsLeft = document.getElementById("rollsLeftOne");
	var rollsLeftTwo = document.getElementById("rollsLeftTwo");
	var rollsLeftThree = document.getElementById("rollsLeftThree");
			
	var score = <?php echo $_SESSION["scoreOne"] ?>;
	var score = <?php echo $_SESSION["scoreOne"] ?>;
	var scoreTwo = <?php echo $_SESSION["scoreTwo"] ?>;
	var scoreThree = <?php echo $_SESSION["scoreThree"] ?>;
	
	var newScore = document.getElementById("scoreOne");
	var newScoreTwo = document.getElementById("scoreTwo");
	var newScoreThree = document.getElementById("scoreThree");
	
	var button = document.getElementById("rollBtnOne");
	var buttonTwo = document.getElementById("rollBtnTwo");
	var buttonThree = document.getElementById("rollBtnThree");
	var temp;
	var temp2;
	var temp3;
	
	
	var img = new Image();
	var img2 = new Image();
	var img3 = new Image();
	var canvas;
	var canvas2;
	var canvas3;
	var ctx;
	var ctx2;
	var ctx3;
	
	var results = document.getElementById("results");
	
	function draw(temp, img, canvas, ctx){
		ctx = canvas.getContext("2d");	
		
		if(temp == 1){
			img.src='img/dice1.gif';
		}
		else if(temp == 2){
			img.src='img/dice2.gif';
		}
		else if(temp == 3){
			img.src='img/dice3.gif';
		}
		else if(temp == 4){
			img.src='img/dice4.gif';
		}
		else if(temp == 5){
			img.src='img/dice5.gif';
		}
		else if(temp == 6){
			img.src='img/dice6.gif';
		}
		
		img.onload = function(){
			ctx.drawImage(img, 1, 1);
		}
	}

	function remove(){
		ctx = canvas.getContext("2d");	
		ctx2 = canvas2.getContext("2d");	
		ctx3 = canvas3.getContext("2d");	
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		ctx2.clearRect(0, 0, canvas.width, canvas.height);
		ctx3.clearRect(0, 0, canvas.width, canvas.height);
	}
	
	
	function rollTwo(){
		canvas = document.getElementById("dicePicOne");	
		canvas2 = document.getElementById("dicePicOne2");	
		canvas3 = document.getElementById("dicePicOne3");	
		remove();
		
		temp = Math.floor(Math.random()* 6) + 1;	
		canvas = document.getElementById("dicePicTwo");	
		temp2 = Math.floor(Math.random()* 6) + 1;
		canvas2 = document.getElementById("dicePicTwo2");	
		temp3 = Math.floor(Math.random()* 6) + 1;
		canvas3 = document.getElementById("dicePicTwo3");	
		
		if(rollsTwo != 0){
			rollsTwo--;
			rollsLeftTwo.innerHTML = rollsTwo;
			scoreTwo = scoreTwo+temp+temp2+temp3;
			newScoreTwo.innerHTML = scoreTwo;
			buttonTwo.classList.add('disabled');
			buttonTwo.disabled = true;
			buttonThree.classList.remove('disabled');
			buttonThree.disabled = false;
			draw(temp, img, canvas, ctx);		
			draw(temp2, img2, canvas2, ctx2);		
			draw(temp3, img3, canvas3, ctx3);
		}
	}
	
	function rollThree(){
		canvas = document.getElementById("dicePicTwo");	
		canvas2 = document.getElementById("dicePicTwo2");	
		canvas3 = document.getElementById("dicePicTwo3");	
		remove();			
		
		temp = Math.floor(Math.random()* 6) + 1;	
		canvas = document.getElementById("dicePicThree");
		temp2 = Math.floor(Math.random()* 6) + 1;
		canvas2 = document.getElementById("dicePicThree2");	
		temp3 = Math.floor(Math.random()* 6) + 1;
		canvas3 = document.getElementById("dicePicThree3");	
		
		if(rollsThree != 0){
			rollsThree--;
			rollsLeftThree.innerHTML = rollsThree;
			scoreThree = scoreThree+temp+temp2+temp3;
			newScoreThree.innerHTML = scoreThree;
			buttonThree.classList.add('disabled');
			buttonThree.disabled = true;
			button.classList.remove('disabled');
			button.disabled = false;
			draw(temp, img, canvas, ctx);
			draw(temp2, img2, canvas2, ctx2);		
			draw(temp3, img3, canvas3, ctx3);
		}
		if(rolls == 0){
			button.classList.add('disabled');
			button.disabled = true;
			results.style.transition = "opacity 1.5s"; 
			results.style.opacity = "1";
			results.style.cursor = "pointer";
			results.disabled = false;
			setVariables();
		}
	}

	function rollOne(){
		canvas = document.getElementById("dicePicThree");	
		canvas2 = document.getElementById("dicePicThree2");	
		canvas3 = document.getElementById("dicePicThree3");	
		remove();
		
		temp = Math.floor(Math.random()* 6) + 1;	
		canvas = document.getElementById("dicePicOne");		
		temp2 = Math.floor(Math.random()* 6) + 1;
		canvas2 = document.getElementById("dicePicOne2");	
		temp3 = Math.floor(Math.random()* 6) + 1;
		canvas3 = document.getElementById("dicePicOne3");	
		
		if(rolls != 0){
			rolls--;
			rollsLeft.innerHTML = rolls;
			score = score+temp+temp2+temp3;
			newScore.innerHTML = score;
			button.classList.add('disabled');
			button.disabled = true;
			buttonTwo.classList.remove('disabled');
			buttonTwo.disabled = false;	
			draw(temp, img, canvas, ctx);		
			draw(temp2, img2, canvas2, ctx2);		
			draw(temp3, img3, canvas3, ctx3);		
		}
	}
	

	
	function setVariables(){
		$.ajax({
			url: 'results.php',
			data: {"score":score, "scoreTwo":scoreTwo, "scoreThree":scoreThree},
			type: 'post',
			success:function(data){
				console.log("dela");
			}
		});
	}
	</script>
	
</body>	
</html>